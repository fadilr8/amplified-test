@extends('dashboard')

@section('title')
    Assign User Role
@endsection

@section('header')
    Assign Role
@endsection

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                Assign Role
            </div>
            <div class="m-4">
                <table class="table-auto w-full">
                    <thead>
                        <th class="px-4 py-2 text-emerald-600">Name</th>
                        <th class="px-4 py-2 text-emerald-600">Role</th>
                        <th class="px-4 py-2 text-emerald-600">Permission</th>
                        <th class="px-4 py-2 text-emerald-600">Assign Role</th>
                        <th class="px-4 py-2 text-emerald-600">Action</th>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="border border-emerald-500 px-4 py-2 text-emerald-600 font-medium">{{ $user->name }}</td>
                                <td class="border border-emerald-500 px-4 py-2 text-emerald-600 font-medium">
                                    @if ($user->roles->count() != 0)
                                        <ul>
                                            @foreach ($user->roles as $role)
                                            <li>{{ $role->display_name }}</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="border border-emerald-500 px-4 py-2 text-emerald-600 font-medium">
                                    @if ($user->allPermissions()->count() != 0)
                                        <ul>
                                            @foreach ($user->allPermissions() as $permission)
                                            <li>{{ $permission->display_name }}</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        -
                                    @endif
                                </td>
                                <form method="POST" action="{{ url('/role', ['id' => $user->id]) }}">
                                    @csrf
                                    <td class="border border-emerald-500 px-4 py-2 text-emerald-600 font-medium">
                                        <div>
                                            <select name="role" id="role-{{ $user->id }}">
                                                <option value="">Choose Role</option>
                                                @foreach ($roles as $role)
                                                <option value="{{ $role->name }}">{{ $role->display_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </td>
                                    <td class="border border-emerald-500 px-4 py-2 text-emerald-600 font-medium">
                                        <div>
                                            <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" type="submit">
                                                Assign Role
                                            </button> 
                                        </div>
                                    </td>
                                </form>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>    
@endsection
