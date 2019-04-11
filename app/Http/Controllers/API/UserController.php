<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('api');
    }
    
    public function index() {
        return \App\User::with('profile', 'profile.subcategory', 'profile.subcategory.category')
            ->paginate();
    }
}
