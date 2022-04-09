@extends('layouts.app')

@section('content')
<div class="container">

    <table  class="table">
        <thead>
            <tr>
                <th scope="col">{{__('Title')}}</th>
                <th>{{__('description')}}</th>
                @if (auth()->user())
                    @if (auth()->user()->is_admin)
                    <th>{{__('Edit')}}</th>
                    @endif
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
            <tr>
                <td><h3>{{$project->title}}</h3></td>
                <td><p>{{$project->body}}</p></td>
                @if (auth()->user())
                    @if (auth()->user()->is_admin)
                    <td><p><a href="projects/{{$project->id}}/edit">Edit</a></p></td>
                    @endif
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
