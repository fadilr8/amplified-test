<x-app-layout>
    <x-slot name="title"></x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @yield('header')
        </h2>
    </x-slot>

    @if (Auth::user()->hasRole(['superadministrator']))
    @yield('content')
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
