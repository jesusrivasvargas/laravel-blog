<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index() {
        return \App\Category::select('id', 'category')-> get();
    }

    public function search(Request $request) {
        $q = $request->has('q') ? $request->q : '';
        return \App\Category::select('id', 'category')->where('category', 'like', '%'.$q.'%')->get();
    }
}
