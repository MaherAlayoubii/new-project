<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->get();
        return view('users', compact('users'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name'  => 'required|max:50',
            'email' => 'required|email',
        ]);

        DB::table('users')->insert([
            'name'  => $request->name,
            'email' => $request->email,
            'password' => Hash::make('password123'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back();
    }

    public function destroy($id)
    {

        // DB::table('users')->where('id', $id)->delete();
        User::destroy($id);

        return redirect()->back();
    }

    public function edit($id)
    {
        $user  = DB::table('users')->where('id', $id)->first();
        $users = DB::table('users')->get();
        return view('users', compact('user', 'users'));
    }

    public function update()
    {
        $id = $_POST['id'];

        // DB::table('users')->where('id', '=', $id)->update([
        //     'name'  => $_POST['name'],
        //     'email' => $_POST['email'],
        // ]);

        $user = User::find($id);
        $user->name = $_POST['name'];
        $user->email = $_POST['email'];
        $user->save();

        return redirect('users');
    }
}
