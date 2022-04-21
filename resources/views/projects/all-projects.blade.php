@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{__('Projects Show')}}</div>                
                <div class="card-body">
                    <div class="row">
                      @if (!blank($projects))
                        @foreach ($projects as $project)
                            <div class="col-lg-4 col-md-6 col-6 mb-2">
                                <div class="d-block mb-2 border rounded p-2">
                                    <a href="{{route('project.show', $project->id)}}" style="color:#525252;">                                        
                                        <img src="{{ asset('storage/' .$project->project_image) }}" alt="" class="img-fluid img-thumbnail">
                                        <b><p style="height: 25px">{{app()->getLocale()== 'ar' ? $project->title_ar:$project->title_en}}</p></b>
                                    </a>                                  
                                    <p>{{app()->getLocale()== 'ar' ? Str::limit($project->body_ar, 60):Str::limit($project->body_en, 60) }}</p>                                   

                                    @auth
                                    @if(auth()->user()->is_admin > 0)  
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-sm">
                                            <a href="{{route('projects.edit', $project->id)}}"><i class="far fa-edit text-success fa-lg ml-3"></i></a>
                                        </div>
                                        <div class="col-sm">
                                            <form method="POST" action="{{route('projects.destroy', $project->id)}}" onsubmit="return confirm('هل أنت متأكد أنك تريد حذف المشروع هذا ؟')" class="d-flex justify-content-end">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="border-0 bg-transparent"><i class="far fa-trash-alt text-danger fa-lg"></i></button>
                                            </form>
                                        </div>            
                                    </div> 
                                    @endif
                                @endauth
                                </div>
                            </div>
                        @endforeach
                        @else
                        <h3 style="margin: 0 auto;">لا يوجد نتايج</h3>              
                      @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
