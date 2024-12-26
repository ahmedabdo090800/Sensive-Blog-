<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;  
use App\Models\Subscribe;  

class SubscribeController extends Controller
{
    public function store(Request $request){

       $data= $request->validate([
            'email'=>'required|email|unique:subscribes,email'

        ]);

        Subscribe::create($data);
        return back()->with('status','Subscribed Successfully');

    }
}
