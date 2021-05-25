<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @if (Auth::user()->hasRole(['superadministrator']))
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Administrator Page
                </div>
                <table class="table-auto">
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
                                                <option value="finance_administrator">Finance Administrator</option>
                                                <option value="customer_administrator">Customer Administrator</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                       <button type="submit">Assign Role</button> 
                                    </td>
                                </form>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @else
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>
    @endif
</x-app-layout>
