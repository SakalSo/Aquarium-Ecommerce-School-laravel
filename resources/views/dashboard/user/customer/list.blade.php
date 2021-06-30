@extends('layout.dashboard')

@php
$idSort = app('request')->input('customer_id-sort');
$nameSort = app('request')->input('name-sort');
@endphp

{{-- page title --}}
@section('page_title', 'Customer List')


@section('dashboard_content')
    {{-- Table --}}
    @include('partials.flash-message')

    <table class="table shadow-lg bg-white">
        <thead class="thead-dark thead-btn">
            <tr>
                <form id="customer_id-sort-form">
                    @csrf
                    <th onclick="$('#customer_id-sort-form').submit()">
                        ID
                        @if ($idSort === 'desc')
                            <i class="fas fa-caret-up ml-2"></i>
                            <input type="hidden" name="customer_id-sort" value="asc">
                        @else
                            <i class="fas fa-caret-down ml-2"></i>
                            <input type="hidden" name="customer_id-sort" value="desc">
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
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
                <tr>
                    <td>{{ $customer->customer_id }}</td>
                    <td>{{ $customer->user->name }}</td>
                    <td>
                        Customer
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $customers->links() }}
@endsection
