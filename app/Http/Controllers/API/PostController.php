<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth:api');
    }
    
    public function index() {
        $user = request()->user();
        
        return \App\Post::paginate();
    }
}
