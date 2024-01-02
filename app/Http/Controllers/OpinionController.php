<?php

namespace App\Http\Controllers;

use App\Models\Opinion;
use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OpinionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, $policyId)
    {

        $validator = Validator::make($request->all(), [
            'content' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Create opinion is failed',
                'error' => $validator->errors()
            ]);
        }

        $opinion = Opinion::create([
            'policy_id' => $policyId,
            'user_id' => Auth::user()->id,
            'opinion_status' => $request->isAgree,
            'opinion_content' => $request->content,
            'created_at' => now(),
            'updated_at' => null
        ]);

        if (!$opinion) {
            return response()->json([
                'message' => 'Failed to create opinion'
            ], 500);
        }

        return response()->json([
            'message' => 'Opinion has been published',
            'data' => $opinion
        ], 201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function get($policyId)
    {
        $opinions = Opinion::where('policy_id', $policyId)
            ->orderBy('created_at', 'desc')
            ->get();
        if ($opinions->isEmpty()) {
            return response()->json([
                'message' => 'No opinions found for the policy'
            ], 404);
        }

        $formattedOpinions = $opinions->map(function ($opinion) {
            return [
                'id' => $opinion->id,
                'policy_id' => $opinion->policy_id,
                'user_id' => $opinion->user_id,
                'opinion_status' => $opinion->opinion_status,
                'opinion_content' => $opinion->opinion_content,
                'created_at' => Carbon::parse($opinion->created_at)->format('Y-m-d'),
                'updated_at' => Carbon::parse($opinion->updated_at)->format('Y-m-d'),
            ];
        });

        return response()->json([
            'message' => 'opinion shown',
            'data' => $formattedOpinions
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Opinion $opinion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Opinion $opinion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($opinionId, $policyId)
    {
        $opinion = Opinion::where('id', $opinionId)
            ->where('user_id', Auth::user()->id)
            ->where('policy_id', $policyId)
            ->first();

        if (!$opinion) {
            return response()->json([
                'message' => 'Opinion not found or unauthorized'
            ], 404);
        }


        // Delete the opinion
        $opinion->delete();

        return response()->json([
            'message' => 'Opinion has been deleted'
        ]);
    }

    public function checkAuthorization($opinionId)
    {
     
        $opinion = Opinion::where('id', $opinionId)->first();
        if (!$opinion) {
            return response()->json([
                'message' => 'Error',
                'error' => 'Opinion not found'
            ], 404);
        }
        $canDelete =  $opinion->user_id === Auth::user()->id;

        return response()->json([
            'canDelete' => $canDelete
        ]);
    }

}
