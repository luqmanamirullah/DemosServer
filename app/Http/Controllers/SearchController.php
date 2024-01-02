<?php

namespace App\Http\Controllers;

use App\Http\Resources\NewsResource;
use App\Models\News;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function getEverything(Request $request)
    {
        $q = $request->q;
        $searchMatch = News::where('news_title', 'LIKE', '%'.$q.'%')->orWhere('news_content', 'LIKE', '%'.$q.'%')->get();

        if ($searchMatch->isEmpty()) {
            return response()->json([
                'message' => 'No results found'
            ], 404);
        }

        return NewsResource::collection($searchMatch);
    }
}
