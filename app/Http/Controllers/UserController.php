<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\ShowUserResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        $user = UserResource::collection($user);
        return response()->json(['success'=> true, 'data'=>$user], 200);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        
        // $user = User::create([
        //     'name'=> request('name'),
        //     'email'=> request('email'),
        //     'password' => Hash::make($request->password)   
        // ]);
        // $user->phone()->create([
        //     'number'=>request('number'),
        // ]);
        // dd(1);
        $user = User::store($request);
        return response()->json(['success'=> true, 'data'=>$user], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::find($id);
        $user = new ShowUserResource($user);
        return response()->json(['success'=> true, 'data'=>$user], 200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUserRequest $request, $id)
    {
        $user = User::store($request,$id);
        return response()->json(['success'=> true, 'data'=>$user], 200);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json(['success'=> true, 'message'=>"successful"], 200);

    }
}
