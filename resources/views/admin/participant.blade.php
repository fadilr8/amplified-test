@extends('dashboard')

@section('title')
    Online Test Participant List
@endsection

@section('header')
    Participants
@endsection

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                Online Test Participants
            </div>
            <div class="m-4">
                <table class="table-auto">
                    <thead>
                        <th class="px-4 py-2 text-emerald-600">No</th>
                        <th class="px-4 py-2 text-emerald-600">Email</th>
                        <th class="px-4 py-2 text-emerald-600">Score</th>
                        <th class="px-4 py-2 text-emerald-600">Test Taken</th>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($participants as $participant)
                            <tr>
                                <td class="border border-emerald-500 px-4 py-2 text-emerald-600 font-medium">{{ $no++ }}</td>
                                <td class="border border-emerald-500 px-4 py-2 text-emerald-600 font-medium">{{ $participant->email }}</td>
                                <td class="border border-emerald-500 px-4 py-2 text-emerald-600 font-medium">{{ $participant->score }}</td>
                                <td class="border border-emerald-500 px-4 py-2 text-emerald-600 font-medium">{{ $participant->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>    
@endsection
