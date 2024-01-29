<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        if($user)
        {
            $user->role_as = $request->role_as;
            $user->save();
            return redirect('admin/users')->with('message', 'Updated Successfully');
        }
        return redirect('admin/users')->with('message', 'No User Found');
    }
}
