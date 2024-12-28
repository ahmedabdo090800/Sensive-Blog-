<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\delete;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Extension\CommonMark\Node\Inline\Strong;

class BlogController extends Controller
{

    function __construct()
    {
        // $this->middleware('auth')->only(['create']);
        
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()

    {
        if ( Auth::check()){ 

            $categories=Category::get();
            return view('theme.blogs.create',compact('categories'));
        }
         abort(403);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)

    {
        $date=$request->validated();

        $image=$request->image;
        $newImageName=time().'-'.$image->getClientOriginalName();
        $image->storeAs('blogs',$newImageName,'public');
        $date['image']=$newImageName;
        $date['user_id']=Auth::user()->id;
        Blog::create($date);
        return back()->with('blogCreateStatus', 'Your Blog Created Succssefully');


        
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return view('theme.singleBlog',compact('blog'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)

    {
        if($blog->user_id==Auth::user()->id){
            
                        $categories=Category::get();
                        return view('theme.blogs.edit',compact('categories','blog'));

        }

         abort(403);    
        }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        if($blog->user_id==Auth::user()->id){
        $date=$request->validated();
        if($request->hasFile('image')){
            
                    Storage::delete("public/blogs/$blog->image");
                    $image=$request->image;
                    $newImageName=time().'-'.$image->getClientOriginalName();
                    $image->storeAs('blogs',$newImageName,'public');
                    $date['image']=$newImageName;

        }
        $blog->update($date);
        return back()->with('blogUpdateStatus', 'Your Blog Updated Succssefully');


    }
    abort(403);
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        if($blog->user_id==Auth::user()->id){

        Storage::delete("public/blogs/$blog->image");
        $blog->delete();
        return back()->with('blogDeleteStatus', 'Your Blog Deleted Succssefully');
        }

        abort(403);





        
    }
      /**
    
     * Remove the specified resource from storage.
     */
    public function myblogs()

    {
        if ( Auth::check()){ 

        $blogs=Blog::where('user_id',Auth::user()->id)->paginate(10);
        return view('theme.blogs.myblogs',compact('blogs'));
        }
        abort(403);

    }
}
