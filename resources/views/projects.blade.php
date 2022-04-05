@extends('layouts.app')

@section('content')
<div class="container">

    <table  class="table">
        <thead>
            <tr>
                <th scope="col">{{__('Title')}}</th>
                <th>{{__('description')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
            <tr>
                <td><h3>{{$project->title}}</h3></td>
                <td><p>{{$project->body}}</p></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection