<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
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
    public function register(Request $request)
    {
        try {
            User::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => $request->password,
            ]);

            return response()->json(['message' => 'User Registered Successfully!'], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Server Error!']);

            throw $th;
        }
    }

    public function login(Request $request)
    {
        $user = User::where('username', $request->username)->where('password', $request->password)->first()->get();

        if ($user->count() != 0) {
            return $user;
        }

        return response()->json(['Message' => 'Login Error'], 400);
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
