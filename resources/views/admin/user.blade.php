@extends('dashboard')

@section('title')
    User List
@endsection

@section('header')
    Users
@endsection

@section('content')
@if (Auth::user()->isAbleTo('users-create'))
<div class="py-12">
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
      <div class="p-6 bg-white border-b border-gray-200">
            Create User
        </div>
        @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative m-5" role="alert">
            <span class="block sm:inline">{{ session()->get('message') }}</span>
        </div>
        @endif
        <div class="m-4">
            <form method="POST" action="{{ route('user.create') }}" class="w-full max-w-sm">
                @csrf
                <div class="md:flex md:items-center mb-6">
                  <div class="md:w-1/3">
                    <label class="block text-gray-500 font-medium md:text-right mb-1 md:mb-0 pr-4" for="name">
                      Name
                    </label>
                  </div>
                  <div class="ml-10 md:w-2/3">
                    <input class="white appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="name" type="text" name="name">
                  </div>
                </div>
                <div class="md:flex md:items-center mb-6">
                  <div class="md:w-1/3">
                    <label class="block text-gray-500 font-medium md:text-right mb-1 md:mb-0 pr-4" for="email">
                      Email
                    </label>
                  </div>
                  <div class="ml-10 md:w-2/3">
                    <input class="bg-white appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="name" type="email" name="email">
                  </div>
                </div>
                <div class="md:flex md:items-center">
                  <div class="md:w-1/3"></div>
                  <div class="ml-10 md:w-2/3">
                    <button class="shadow bg-transparent hover:bg-gray-700 hover:text-white focus:shadow-outline focus:outline-none text-gray-700 font-bold py-2 px-4 rounded" type="submit">
                      Create User
                    </button>
                  </div>
                </div>
              </form>
        </div>
    </div>
  </div>
</div>
@endif

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                User List
            </div>
            <div class="m-4">
                <table class="table-auto">
                    <thead>
                        <th class="px-4 py-2 text-emerald-600">No</th>
                        <th class="px-4 py-2 text-emerald-600">Name</th>
                        <th class="px-4 py-2 text-emerald-600">Email</th>
                        <th class="px-4 py-2 text-emerald-600">Created at</th>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($users as $user)
                            <tr>
                                <td class="border border-emerald-500 px-4 py-2 text-emerald-600 font-medium">{{ $no++ }}</td>
                                <td class="border border-emerald-500 px-4 py-2 text-emerald-600 font-medium">{{ $user->name }}</td>
                                <td class="border border-emerald-500 px-4 py-2 text-emerald-600 font-medium">{{ $user->email }}</td>
                                <td class="border border-emerald-500 px-4 py-2 text-emerald-600 font-medium">{{ $user->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>    
@endsection
