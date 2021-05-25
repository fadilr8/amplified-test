<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index() {
        $users = User::get();
        $admin = User::find(12);

        // dd($admin->allPermissions()  );
        return view('dashboard', compact('users'));
    }

    public function assignRole(Request $request) {
        $user = User::find($request->id);
        $user->attachRole($request->role);

        return redirect()->back();
    }
}
