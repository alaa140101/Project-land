@extends('layouts.app')

@section('content')
<div class="container">
    @if (!empty($projects))        
    <table  class="table">
        <thead>
            <tr>
                <th scope="col">{{__('Title')}}</th>
                <th>{{__('description')}}</th>
                
            </tr>
        </thead>
        <tbody>  
            <div class="container">
                @foreach ($projects as $project)
                <tr>
                    <td><a class="text-reset" href="{{route('project.show', $project->id)}}"><h3>{{$project->title}}</h3></a></td>
                    <td><p>{{ Str::limit($project->body, 60)}}</p></td>                    
                </tr>                
                @endforeach                
            </div>                       
        </tbody>
        @else 
            <h3>لايوجد لديك مشاريع</h3>
        @endif 
    </table>
</div>
@endsection
