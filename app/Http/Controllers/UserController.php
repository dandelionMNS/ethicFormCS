<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
        public function index()
    {
        $users = User::all();
        return view("users.index", compact("users"));
    }

    public function addPage()
    {
        return view("users.add");
    }

    public function add(Request $request)
    {

        $user = new User();
        $user->role = $request->input('role');
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->matric_no = $request->input('matric_no');
        $user->course_id = $request->input('course_id');
        $user->save();

        $users = User::all();
        return redirect()->route('user.index', ['users' => $users]);
    }


    public function userDetail($id)
    {
        $user = User::findOrFail($id);
        return view('users.userDetails', compact("user"));
    }

    public function userUpdate(Request $request, $id)
    {

        $user = User::findOrFail($id);
        $user->role = $request->input('role');
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->matric_no = $request->input('matric_no');
        $user->course_id = $request->input('course_id');
        $user->save();

        $users = User::all();
        return redirect()->route('user.details', ['id' => $user, 'users' => $users]);
    }

    public function userDelete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        $users = User::all();
        return redirect()->route('user.index');
    }
}