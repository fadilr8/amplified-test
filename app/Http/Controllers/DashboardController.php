<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
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

    public function roleAssign(Request $request) {
        $user = User::find($request->id);
        $user->attachRole($request->role);

        return redirect()->back();
    }

    public function roleAssignIndex(Request $request) {
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

        $user->attachRole('user');

        return redirect()->back()->with('message', 'User has been added!');
    }

    public function roleIndex() {
        $roles = Role::orderBy('created_at', 'desc')->get();
        $permissions = Permission::select('name')->get();
        $arr = [];
        foreach ($permissions as $permission) {
            $exp = explode('-', $permission->name);
            $arr[] = $exp[0]; 
        }
        $sections = array_values(array_unique($arr));

        return view('admin.role_list', compact('roles', 'sections'));
    }

    public function roleCreate(Request $request) {
        // dd($request->all());
        $request->validate([
            'name' => ['required', 'unique:roles'],
            'description' => ['required'],
            'abilities' => ['required'],
            'section_option' => ['required']
        ]);
        if ($request->section_option == 'new') {
            $request->validate([ 'section' => 'required' ]);
            $section = $request->section;
        } else {
            $section = $request->section_option;
        }
        
        $name = $request->name;
        $description = $request->description;
        $abilities = $request->abilities;

        $role = Role::firstOrCreate([
            'name' => \Str::slug($name, '_'),
        ], [
            'display_name' => ucwords($name),
            'description' => $description,
        ]);
        
        $permissions = [];
        foreach ($abilities as $ability) {
            $temp = $ability . ' ' . $section;
            $slug = $section . ' ' . $ability;
            $permissions[] = Permission::firstOrCreate([
                'name' => \Str::slug($slug),
            ], [
                'display_name' => ucwords($temp),
                'description' => $temp
            ])->id; 
        }

        $role->permissions()->sync($permissions);
        $role->flushCache();

        return redirect()->back()->with('message', 'Role has been added!');
    }

    public function permissionAssign(Request $request) {
        // dd($request->all());
        $request->validate([
            'role' => ['required'],
            'abilities' => ['required'],
            'abi_section_option' => ['required']
        ]);
        if ($request->abi_section_option == 'new') {
            $request->validate([ 'abi_section' => 'required' ]);
            $section = $request->abi_section;
        } else {
            $section = $request->abi_section_option;
        }
        
        $abilities = $request->abilities;
        $role = Role::find($request->role);

        $temp = [];
        foreach ($role->permissions as $val) {
            $temp[] = $val->name;
        }
        $keys = [];
        $search = ['create', 'read', 'update', 'delete'];
        foreach ($search as $val) {
            $k = array_search($section . '-' .$val, $temp); 
            if ($k != false) {
                $keys[] = $section . '-' . $val;
            }
        }
        foreach ($keys as $v) {
            $id = Permission::where('name', $v)->first()->id;
            $role->detachPermission($id);
        }

        $permissions = [];
        foreach ($abilities as $ability) {
            $temp = $ability . ' ' . $section;
            $slug = $section . ' ' . $ability;
            $permissions[] = Permission::firstOrCreate([
                'name' => \Str::slug($slug),
            ], [
                'display_name' => ucwords($temp),
                'description' => $temp
            ])->id;
        }

        $role->permissions()->syncWithoutDetaching($permissions);
        $role->flushCache();

        return redirect()->back()->with('msg', 'Ability has been assigned!');
    }

    public function roleChecker(Request $request) {
        $role = Role::find($request->role);
        $section = $request->section;

        $data = [];
        if ($role->hasPermission([$section . '-create'])) {$data[] = 'create';}
        if ($role->hasPermission([$section . '-read'])) {$data[] = 'read';}
        if ($role->hasPermission([$section . '-update'])) {$data[] = 'update';}
        if ($role->hasPermission([$section . '-delete'])) {$data[] = 'delete';}
        
        return json_encode(['data' => $data]);
    }
}
