<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Models\Articles;
use Illuminate\Http\Request;
use App\Models\Categories;

class CategoriesController extends Controller
{
    public function __invoke()
    {
        $categories = Categories::orderBy('order', 'ASC')->get()->all();

        //check count articles
        $formattedCategories = [];
        if(!empty($categories))
        {
            foreach ($categories as $category)
            {
                $articles = Articles::where('category_id', $category->id)->get()->all();
                $category['articles_quantity'] = count($articles);
                $formattedCategories[] = $category;
            }
        }

        return response()->json($formattedCategories);
    }

    public function getCategory(Request $request)
    {
        $category = null;

        if($request->input('category_alias'))
        {
            $category = Categories::where('alias', $request['category_alias'])->get()->first();
        }

        return response()->json($category);
    }
}
