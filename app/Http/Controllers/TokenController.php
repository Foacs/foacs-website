<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TokenController extends Controller
{
    public function createToken(Request $request) {
        $request->validate([
            'token_name' => 'required',
            'ability' => 'required'
        ]);
        $token = $request->user()->createToken($request->token_name, [$request->ability]);
        return back()->with(['token' => $token->plainTextToken]);
    }

    public function deleteToken(Request $request)
    {
        $request->validate([
            'token_id'=>'required|exists:personal_access_tokens,id'
        ]);

        $request->user()->tokens()->where('id', $request->token_id)->delete();

        return back()->with('success', 'Le token a été supprimé');
    }

}
