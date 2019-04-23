<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::when(request()->search, function($query) {
            $query
            ->orWhere('username', 'LIKE', '%' . request()->search . '%')
            ->orWhere('email', 'LIKE', '%' . request()->search . '%')
            ->orWhere('department', 'LIKE', '%' . request()->search . '%')
            ->orWhere('telephone', 'LIKE', '%' . request()->search . '%');
        })
        ->latest()
        ->paginate(request()->rowsPerPage);

        return UserResource::collection($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'department' => 'required',
            'telephone' => 'required',
        ]);

        $user = User::create($requestData);

        return (new UserResource($user))
            ->additional(['message' => 'User was created ']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return (new UserResource($user));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $requestData = $request->validate([
            'email' => 'required|email|unique:users,email,' . $user->id . ',id',
            'department' => 'required',
            'telephone' => 'required',
        ]);

        $user->update($requestData);

        return (new UserResource($user->fresh()))
            ->additional(['message' => 'User was updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return response()->json(['message' => 'User was deleted']);
    }
}
