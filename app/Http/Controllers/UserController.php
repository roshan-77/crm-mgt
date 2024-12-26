<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        //Get users from db
        $users = User::all();
        //return as json
        return response()->json($users);
    }
 
    public function create(){
        dd('here');
    }

    public function show($id){
        //Get
        $user = User::find($id);
        //Show
        if(!$user){
            dd('Roshan');
            abort(404);
        }

        return response()->json($user);
    }

    public function update(Request $request, $id){
        $request->validate(
            [
                'name'=>'required',
                'last_name'=>'required',
                'email'=>'required',
            ]
            );
        //Get user from db
        $user = User::find($id);
        //Update the field
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->save();
        //return as json
        dd($user);
        return response()->json($user);
    }
}
