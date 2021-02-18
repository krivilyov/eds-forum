<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Models\Articles;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Helpers\Useful;

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

    public function createArticle(Request $request)
    {
        $user = $request->user();

        $validation = Validator::make($request->all(), [
            'title'       => 'required|string|max:90',
            'content'     => 'required|string',
            'category_id' => 'required|int',
        ]);

        if($validation->fails())
        {
            return response([
                'errors' => $validation->errors()
            ], 422);
        }

        $article = new Articles();
        $article->alias = '';
        $article->title = Useful::parseCleanValue($request['title']);
        $article->content = Useful::parseCleanValue($request['content']);
        $article->category_id = $request['category_id'];
        $article->user_id = $user->id;

        if($article->save())
        {
            //create alias
            $article->alias = Useful::create_alias($article->id, Useful::translit($article->title, 'art'));
            $article->save();
        }

        return response()->json($article);
    }
}
