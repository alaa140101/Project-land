@extends('layouts.app')

@section('content')
<div class="container">
    @if (count($projects))        
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
                        <td><a class="text-reset" href="{{route('project.show', $project->id)}}"><h3>{{app()->getLocale()== 'ar' ? $project->title_ar:$project->title_en}}</h3></a></td>
                        <td><p>{{app()->getLocale()== 'ar' ? Str::limit($project->body_ar, 60):Str::limit($project->body_en, 60) }}</p></td>                    
                    </tr>                
                    @endforeach                
                </div>                       
            </tbody>
        </table>
    @else 
        <h3>لايوجد لديك مشاريع</h3>
    @endif 
</div>
@endsection
