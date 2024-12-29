<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use App\Models\Contact;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(StoreCommentRequest $request){
        $data=$request->validated();
        
        Comment::create($data);
        return back()->with('commentStatus','Your Comment Published Successfully');
        
    }
}

