@extends('layout.dashboard')


{{-- page title --}}
@section('page_title', 'Create User')

@section('dashboard_content')
    <div class="bg-white p-3">
        <form action="{{ action('Dashboard\DashboardController@store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="user">Username *</label>
                <input type="name" name="name" class="form-control" id="name" aria-describedby="nameHelp"
                    placeholder="Enter username" required>
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp"
                    placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="password">Password *</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
