<?php

namespace App\Http\Controllers;

use App\Models\Policy;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PolicyController extends Controller
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
    public function create()
    {
        //
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
    public function get()
    {
        $policies = Policy::with('opinions')->get();

        $formattedPolicies = $policies->map(function ($policy) {
            return [
                'policy_file' => $policy->policy_file,
                'policy_title' => $policy->policy_title,
                'policy_theme' => $policy->policy_theme,
                'policy_source' => $policy->policy_source,
                'opinion_count' => number_format($policy->opinions->count(), 0, ',', '.'),
            ];
        });

        return response()->json([
            'data' => $formattedPolicies
        ]);
    }

    public function getFile($id)
    {
        $file = Policy::where('id', $id)->get('policy_file');

        if (!$file) {
            return response()->json([
                'message' => 'Error',
                'error' => 'Policy do not file'
            ]);
        }

        return response()->json([
            'message' => 'File shown',
            'data' => $file 
        ]);
    }

    public function getDetails($id)
    {
        $policyDetails = Policy::where('id', $id)
            ->with('impacts','policyChangeds','policyChanges','policyRepeals','policyAppointedWiths')
            ->get();

        $foremattedPolicyDetails = $policyDetails->map(function ($detail){
            return [
                'explanation' => $detail->policy_explanation,
                'type' => $detail->policy_type,
                'theme' => $detail->policy_theme,
                'entity' => $detail->policy_entity,
                'source' => $detail->policy_source,
                'year' => $detail->policy_year,
                'number' => $detail->policy_number,
                'title' => $detail->policy_title,
                'appointed at' => $detail->appointed_at,
                'created_at' => Carbon::parse($detail->created_at)->format('Y-m-d'),
                'updated_at' => Carbon::parse($detail->updated_at)->format('Y-m-d'),
                'impacts' => $detail->impacts->pluck('content')->toArray(),               
                'policy changeds' => $detail->policyChangeds->pluck('content')->toArray(),               
                'policy changes' => $detail->policyChanges->pluck('content')->toArray(),               
                'policy repeals' => $detail->policyRepeals->pluck('content')->toArray(),               
                'policy appointed with' => $detail->policyAppointedWiths->pluck('content')->toArray(),               
            ];
        });
        return response()->json([
            'message' => 'Detail success showed',
            'data' => $foremattedPolicyDetails
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Policy $policy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Policy $policy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Policy $policy)
    {
        //
    }
}
