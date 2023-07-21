<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function getAllArticles()
    {
        $articles = Article::all();
        $articles->makeHidden(['created_at', 'updated_at']);
        return $articles;
    }

    public function getArticleById(Article $article)
    {
        $article->makeHidden(['created_at', 'updated_at']);
        return $article;
    }

    public function postArticle(Request $request)
    {
        if($request->has('id'))
        {
            $article = Article::findOrFail($request->id);
            $article->makeHidden(['created_at', 'updated_at']);
            $article->fill($request->all());
            $article->save();
            return $article;
        }
        $article = new Article();
        $article->makeHidden(['created_at', 'updated_at']);
        $article->fill($request->all());
        $article->save();
        return $article;
    }
}
