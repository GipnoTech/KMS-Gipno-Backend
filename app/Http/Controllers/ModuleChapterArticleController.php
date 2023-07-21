<?php

namespace App\Http\Controllers;

use App\Models\ModuleChapterArticle;
use Illuminate\Http\Request;

class ModuleChapterArticleController extends Controller
{
    public function getAllModuleChapterArticles()
    {
        $moduleChapterArticle = ModuleChapterArticle::all();
        $moduleChapterArticle->makeHidden(['created_at', 'updated_at']);
        return $moduleChapterArticle;
    }

    public function getModuleChapterArticleById(ModuleChapterArticle $moduleChapterArticle)
    {
        $moduleChapterArticle->makeHidden(['created_at', 'updated_at']);
        return $moduleChapterArticle;
    }

    public function postModuleChapterArticle(Request $request)
    {
        if($request->has('id'))
        {
            $moduleChapterArticle = ModuleChapterArticle::findOrFail($request->id);
            $moduleChapterArticle->makeHidden(['created_at', 'updated_at']);
            $moduleChapterArticle->fill($request->all());
            $moduleChapterArticle->save();
            return $moduleChapterArticle;
        }
        $moduleChapterArticle = new ModuleChapterArticle();
        $moduleChapterArticle->makeHidden(['created_at', 'updated_at']);
        $moduleChapterArticle->fill($request->all());
        $moduleChapterArticle->save();
        return $moduleChapterArticle;
    }
}
