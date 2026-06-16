<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Creator;
use App\Models\Investor;

class OnboardingController extends Controller
{
    public function creator()
    {
        if (request()->user()->role !== 'creator') {
            return redirect()->route('dashboard');
        }
        return view('onboarding.creator');
    }

    public function storeCreator(Request $request)
    {
        $request->validate([
            'dob' => 'required|date',
            'niche' => 'required|string',
            'sub_niche' => 'required|string',
            'social_media_links' => 'nullable|array',
        ]);

        Creator::updateOrCreate(
            ['user_id' => $request->user()->id],
            $request->only(['dob', 'niche', 'sub_niche', 'social_media_links'])
        );

        return redirect()->route('dashboard');
    }

    public function investor()
    {
        if (request()->user()->role !== 'investor') {
            return redirect()->route('dashboard');
        }
        return view('onboarding.investor');
    }

    public function storeInvestor(Request $request)
    {
        $request->validate([
            'business_name' => 'required|string',
            'website' => 'nullable|url',
            'business_category' => 'required|string',
            'sub_category' => 'required|string',
        ]);

        Investor::updateOrCreate(
            ['user_id' => $request->user()->id],
            $request->only(['business_name', 'website', 'business_category', 'sub_category'])
        );

        return redirect()->route('dashboard');
    }
}
