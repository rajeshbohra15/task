<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $post=Blog::all();
        return view('dashboard')->with('post',$post);
    }
}
