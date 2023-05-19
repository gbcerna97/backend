<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $validated = $request->validated();
        
        $validated['password'] = Hash::make($validated['password']);

        $user = User::create($validated);

        return $user;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::where('id', $id)->firstorFail();

        return $user;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        $validated = $request->validated();
        
        $user = User::findorFail($id);

        $user->name = $validated['name'];
        $user -> save();

        return $user;
    }

    /**
     * Update for the specified resource in storage.
     */
    public function email(UserRequest $request, string $id)
    {
        $validated = $request->validated();
        
        $user = User::findorFail($id);

        $user->email = $validated['email'];
        $user -> save();
        
        return $user;
    }

    /**
     * Update the specified resource in storage.
     */
    public function password(UserRequest $request, string $id)
    {
        $validated = $request->validated();
        
        $user = User::findorFail($id);

        $user->password = Hash::make($validated['password']);;
        $user -> save();
        
        return $user;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findorFail($id);
        $user->delete();
        return $user;
    }

    /**
     *Update image of the specified resource.
     */
    public function image(UserRequest $request, string $id)
    {
        $user = User::findorFail($id);

        $validated = $request->validated();

        $user->image = $request->file('image')->storePublicly('images', 'public');

        if(!is_null($user->image)) {
            Storage::delete($user->image);
        } 

        $user->save();

        return $user;
    }
}
