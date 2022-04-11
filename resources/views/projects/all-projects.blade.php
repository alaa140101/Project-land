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
            <div class="container">
                @foreach($projects as $project)
                <tr>
                    <td><a href="{{route('project.show', $project->id)}}"><h3>{{$project->title}}</h3></a></td>
                    <td><p>{{ Str::limit($project->body, 60)}}</p></td>
                    @if (auth()->user())
                    @if (auth()->user()->is_admin)
                    <td><p><a href="projects/{{$project->id}}/edit">Edit</a></p></td>
                    @endif
                    @endif
                </tr>
                @endforeach
            </div>                       
        </tbody>
    </table>
</div>
@endsection
