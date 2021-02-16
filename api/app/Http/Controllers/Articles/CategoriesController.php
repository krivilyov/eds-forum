<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;

class CategoriesController extends Controller
{
    public function __invoke()
    {
        $categories = Categories::orderBy('order', 'ASC')->get()->all();

        return response()->json($categories);
    }
}
