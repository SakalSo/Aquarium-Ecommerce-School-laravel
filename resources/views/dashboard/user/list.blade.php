@extends('layout.dashboard')

@php
$idSort = app('request')->input('staff_id-sort');
$nameSort = app('request')->input('name-sort');
@endphp

{{-- page title --}}
@section('page_title', 'Staff List')


@section('dashboard_content')
    {{-- Table --}}
    @include('partials.flash-message')

    <table class="table shadow-lg bg-white">
        <thead class="thead-dark thead-btn">
            <tr>
                <form id="staff_id-sort-form">
                    @csrf
                    <th onclick="$('#staff_id-sort-form').submit()">
                        ID
                        @if ($idSort === 'desc')
                            <i class="fas fa-caret-up ml-2"></i>
                            <input type="hidden" name="staff_id-sort" value="asc">
                        @else
                            <i class="fas fa-caret-down ml-2"></i>
                            <input type="hidden" name="staff_id-sort" value="desc">
                        @endif
                </form>
                <form id="name-sort-form">
                    @csrf
                    <th onclick="$('#name-sort-form').submit()">
                        Name
                        @if ($nameSort === 'desc')
                            <i class="fas fa-caret-up ml-2"></i>
                            <input type="hidden" name="name-sort" value="asc">
                        @else
                            <i class="fas fa-caret-down ml-2"></i>
                            <input type="hidden" name="name-sort" value="desc">
                        @endif
                </form>
                <th>Role</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($staffs as $staff)
                <tr>
                    <td>{{ $staff->staff_id }}</td>
                    <td>{{ $staff->user->name }}</td>
                    <td>
                        @if ($staff->is_admin)
                            Admin
                            <i class="fas fa-user-tie pl-2"></i>
                        @else
                            Staff
                        @endif
                    </td>
                    <td class="d-flex">
                        <a class="text-dark mr-1" href="{{ url('dashboard/staff/edit', ['id' => $staff->staff_id]) }}"><i
                                class="fas fa-edit"></i></a>
                        <form action="{{ action('Dashboard\DashboardController@destroy', ['id' => $staff->staff_id]) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class=" btn btn-link p-0 text-dark ml-3"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            <tr class="tr-hover-dark cursor-pointer">
                <td colspan="4" class="text-center">
                    <a class="btn-link text-dark" href="{{ url('dashboard/staff/add') }}">Add a new staff</a>
                    <i class="fas fa-user-plus pl-2"></i>
                </td>
            </tr>
        </tbody>
    </table>
    {{ $staffs->links() }}
@endsection
