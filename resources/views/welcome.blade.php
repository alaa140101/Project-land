@extends('layouts.main')

@section('content')
<div class="container">

    <table  class="table">
        <thead>
            <tr>
                <th scope="col">name</th>
                <th scope="col">email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
