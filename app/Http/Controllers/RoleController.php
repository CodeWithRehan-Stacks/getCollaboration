<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function select()
    {
        return view('role.select');
    }

    public function store(Request $request)
    {
        $request->validate([
            'role' => ['required', 'in:creator,investor'],
        ]);

        $user = Auth::user();
        $user->role = $request->role;
        $user->save();

        return redirect()->route('onboarding.' . $request->role);
    }
}
