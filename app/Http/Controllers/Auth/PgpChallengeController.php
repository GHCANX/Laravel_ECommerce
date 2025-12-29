<?php

namespace App\Http\Controllers;

use App\Http\Requests\PgpChallengeRequest;

class PgpChallengeController extends Controller
{
    public function show()
    {
        abort_unless(session()->has('pgp_challenge_hash'), 403);

        return view('auth.challenge', [
            'encrypted' => session('encrypted_challenge'),
        ]);
    }

    public function verify(PgpChallengeRequest $request)
    {
        $hash = session('pgp_challenge_hash');
        $userId = session('pgp_challenge_user');

        if (!hash_equals($hash, hash('sha256', $request->challenge_response))) {
            return back()->withErrors(['challenge_response' => 'Invalid challenge']);
        }

        auth()->loginUsingId($userId);

        session()->forget([
            'pgp_challenge_hash',
            'pgp_challenge_user',
            'encrypted_challenge',
        ]);

        return redirect()->intended('/');
    }
}
