<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Participant;

class DashboardController extends Controller
{
    public function index() {
        return view('dashboard');
    }
    
    public function participants() {
        $participants = Participant::all();
    
        return view('admin.participant', compact('participants'));
    }

    public function assignRole(Request $request) {
        $user = User::find($request->id);
        $user->attachRole($request->role);

        return redirect()->back();
    }

    public function roles(Request $request) {
        $users = User::get();
        $admin = User::find(12);
        $roles = Role::all();

        // dd("hello");
        return view('admin.role', compact('users', 'roles'));
    }

    public function users() {
        $users = User::orderBy('created_at', 'desc')->get();

        return view('admin.user', compact('users'));
    }

    public function createUser(Request $request) {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => \Str::random(10),
        ]);

        return redirect()->back()->with('message', 'User has been added!');
    }
}
