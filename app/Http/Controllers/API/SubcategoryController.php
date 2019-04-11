<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubcategoryController extends Controller
{
    public function index(Request $request) {
        return \App\Subcategory::select('id', 'subcategory', 'category_id')
            ->where('category_id', $request->category_id)->get();
    }
}
