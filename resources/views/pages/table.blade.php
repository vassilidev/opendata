@extends('layouts.dashboardLayout')

@section('content')
    <h1 class="m-4">{{ $table }} table</h1>
    <div class="container-fluid">
        @livewire($table . '-table')
    </div>
@endsection
