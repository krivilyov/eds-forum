<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Models\Articles;
use App\Models\Categories;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function getArticles(Request $request)
    {
        $articles = [];

        if($request->input('category_alias'))
        {
            $category = Categories::where('alias', $request['category_alias'])->get()->first();
            if($category)
            {
                $articles = Articles::with(['category', 'user'])->where('category_id', $category->id)->get()->all();
            }
        }

        return response()->json($articles);
    }

    public function getArticle(Request $request)
    {
        $article = null;

        if($request->input('article_alias'))
        {
            $article = Articles::with(['category', 'user'])->where('alias', $request->input('article_alias'))->get()->first();
        }

        return response()->json($article);
    }
}
