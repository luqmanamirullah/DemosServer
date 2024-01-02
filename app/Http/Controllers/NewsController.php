<?php

namespace App\Http\Controllers;

use App\Http\Resources\NewsDetailResource;
use App\Http\Resources\NewsResource;
use App\Http\Resources\NewsTypeResource;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function getBreakingNews(Request $request)
    {
        $type = $request->type;
        $breakingNews = News::breakingNews($type)->get();
        return NewsResource::collection($breakingNews);
    }

    public function getNewsType()
    {
        $type = News::pluck('news_type')->unique()->values();
        $type->prepend('All');
        return new NewsTypeResource($type);
    }

    public function getNewsDetail($id)
    {
        return new NewsDetailResource(News::findOrFail($id));
    }

    public function updateNewsView($id)
    {
        $currentNews = News::findOrFail($id);
        $currentNews->increment('news_view');
        return response()->json([
            'status' => 'ok', 
            'message' => 'News view count updated', 
            'data' => $currentNews
        ]);
    }
}
