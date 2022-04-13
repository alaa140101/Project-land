@extends('layouts.app')

@section('content')
<div class="container">
    <table  class="table">
        <thead>
            <tr>
                <th scope="col">{{__('Title')}}</th>
                <th>{{__('description')}}</th>
                @auth
                    @if (auth()->user()->is_admin)
                    <th>{{__('edit')}}</th>
                    <th>{{__('delete')}}</th>
                    @endif
                @endauth
            </tr>
        </thead>
        <tbody>  
            <div class="container">
                @foreach($projects as $project)
                <tr>
                    <td><a class="text-reset" href="{{route('project.show', $project->id)}}"><h3>{{$project->title}}</h3></a></td>
                    <td><p>{{ Str::limit($project->body, 60)}}</p></td>
                    @auth
                        @if(auth()->user()->is_admin > 0)   
                            <td>
                                <form action="{{route('projects.edit', $project->id)}}" method="get">
                                    @csrf
                                    <button class="float-left" type="submit"><i class="far fa-edit text-success fa-lg ml-3"></i></button>
                                </form>
                            </td>
                            <td>
                                <form method="POST" action="{{route('projects.destroy', $project->id)}}" onsubmit="return confirm('هل أنت متأكد أنك تريد حذف المشروع هذا ؟')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="float-left"><i class="far fa-trash-alt text-danger fa-lg"></i></button>
                                </form>
                            </td>            
                        @endif
                    @endauth
                </tr>
                @endforeach
            </div>                       
        </tbody>
    </table>
     {{-- Pagination --}}
     <div class="d-flex justify-content-center">
        {!! $projects->links() !!}
    </div>
</div>
@endsection
