@extends('layouts.app')

@section('content')
<div class="container">

    <table  class="table">
        <thead>
            <tr>
                <th scope="col">{{__('Name')}}</th>
                <th scope="col">{{__('Email')}}</th>
                <th scope="col">{{__('Subscribe')}}</th>
                <th scope="col">{{__('Admin')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{ $user->is_subscribe == 1 ? 'Yes':'No' }}</td>
                <td>{{ $user->is_admin == 1 ? 'Admin':'User' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
     {{-- Pagination --}}
     <div class="d-flex justify-content-center">
        {!! $users->links() !!}
    </div>
</div>
@endsection
