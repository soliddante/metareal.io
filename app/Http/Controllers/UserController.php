<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function get(Request $request)
    {
        $user = User::where('id', $request->user_id)->first();
        return $user;
    }



    public function update(Request $request)
    {
        // $user = auth()->user();
        $user = User::where('id', 2)->first();
        $user->update([
            'username' => $request->username ?? ($user->username ?? ''),
            'avatar' => $request->avatar ?? $user->avatar,
            'coordinate' => $request->coordinate ?? $user->coordinate,
        ]);
        return $user;
    }
}
