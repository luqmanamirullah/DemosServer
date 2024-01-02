<?php

namespace App\Http\Controllers;

use App\Http\Resources\TrendingListResource;
use App\Models\News;
use Illuminate\Http\Request;

class TrendingListController extends Controller
{
    public function getTrends()
    {
        $trendingNews = News::trending()->get();
        return TrendingListResource::collection($trendingNews);
    }
}
