<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Creator;
use App\Models\Investor;
use App\Models\UserMatch;

class MatchingController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        
        // Ensure user has completed onboarding
        if ($user->role === 'creator' && !$user->creator) {
            return redirect()->route('onboarding.creator');
        }
        if ($user->role === 'investor' && !$user->investor) {
            return redirect()->route('onboarding.investor');
        }
        if (!$user->role || $user->role === 'admin') {
             return redirect()->route('role.select'); // Admin handled differently but fallback
        }

        $matches = [];

        if ($user->role === 'creator') {
            $creator = $user->creator;
            // Find Investors matching Niche and Sub-Niche
            $matchingInvestors = Investor::where('business_category', $creator->niche)
                                         ->where('sub_category', $creator->sub_niche)
                                         ->get();
            
            foreach ($matchingInvestors as $investor) {
                $match = UserMatch::firstOrCreate([
                    'creator_id' => $creator->id,
                    'investor_id' => $investor->id,
                ], [
                    'status' => 'pending'
                ]);
                $matches[] = $match;
            }
        } elseif ($user->role === 'investor') {
            $investor = $user->investor;
            // Find Creators matching Category and Sub-Category
            $matchingCreators = Creator::where('niche', $investor->business_category)
                                       ->where('sub_niche', $investor->sub_category)
                                       ->get();

            foreach ($matchingCreators as $creator) {
                $match = UserMatch::firstOrCreate([
                    'creator_id' => $creator->id,
                    'investor_id' => $investor->id,
                ], [
                    'status' => 'pending'
                ]);
                $matches[] = $match;
            }
        }

        // We fetch the matches again to eager load the relationships
        $displayMatches = [];
        if ($user->role === 'creator') {
            $displayMatches = UserMatch::with('investor.user')->where('creator_id', $user->creator->id)->get();
        } else {
            $displayMatches = UserMatch::with('creator.user')->where('investor_id', $user->investor->id)->get();
        }

        return view('dashboard.discovery', compact('displayMatches'));
    }
}
