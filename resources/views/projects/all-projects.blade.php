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
                    <td><a class="text-reset" href="{{route('project.show', $project->id)}}"><h3>{{app()->getLocale()== 'ar' ? $project->title_ar:$project->title_en}}</h3></a></td>
                    <td><p>{{app()->getLocale()== 'ar' ? Str::limit($project->body_ar, 60):Str::limit($project->body_en, 60) }}</p></td>
                    @auth
                        @if(auth()->user()->is_admin > 0)   
                            <td class="align-middle">
                                <a href="{{route('projects.edit', $project->id)}}"><i class="far fa-edit text-success fa-lg ml-3"></i></a>
                            </td>
                            <td class="align-middle">
                                <form method="POST" action="{{route('projects.destroy', $project->id)}}" onsubmit="return confirm('هل أنت متأكد أنك تريد حذف المشروع هذا ؟')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="border-0 bg-transparent"><i class="far fa-trash-alt text-danger fa-lg"></i></button>
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
