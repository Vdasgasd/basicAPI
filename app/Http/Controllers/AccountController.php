<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\Sanctum;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:accounts',
            'password' => 'required|min:6',
        ]);

        $account = Account::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        return response()->json(['message' => 'Registrasi berhasil', 'account' => $account], 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $account = Account::where('username', $request->username)->first();

        if (!$account || !Hash::check($request->password, $account->password)) {
            return response()->json(['message' => 'Login gagal'], 401);
        }


        $token = $account->createToken('auth-token')->plainTextToken;

        $account->update(['api_token' => $token]);

        return response()->json(['message' => 'Login berhasil', 'token' => $token], 200);
    }

    // public function logout(Request $request)
    // {
    //     $request->user()->currentAccessToken()->delete();

    //     return response()->json(['message' => 'Logout berhasil'], 200);

    //     return response()->json(['message' => 'User not authenticated'], 401);
    // }

    public function logout(Request $request)
    {
        $user = $request->user();

        if ($user) {
            // Revoke token dan hapus dari kolom api_token di tabel accounts
            $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();
            $user->update(['api_token' => null]);

            return response()->json(['message' => 'Logout berhasil'], 200);
        } else {
            return response()->json(['message' => 'Pengguna tidak terautentikasi'], 401);
        }
    }
}
