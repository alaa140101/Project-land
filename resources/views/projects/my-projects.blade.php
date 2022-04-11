@extends('layouts.main')

@section('content')
  <div class="mx-4">
    
    <p class="my-4">{{$title}}</p>
    <div class="row">
      @forelse ($projects as $project)
          <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card">              
              <a href="/projects/{{$project->id}}">
                <div class="card-body p-0">
                  <p class="card-title">{{ Str::limit($project->description), 60)}}</p>
                </div>
              </a>
              <div class="card-footer">
                <small class="text-muted">                 
                  <i class="fas fa-clock"></i> <span> {{$project->created_at->diffForHumans()}}</span>
                  @auth
                    @if($project->user_id == auth()->user()->id || auth()->user()->administration_level > 0)
                      
                    <form method="POST" action="{{route('projects.destroy', $project->id)}}" onsubmit="return confirm('هل أنت متأكد أنك تريد حذف المشروع هذا ؟')">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="float-left"><i class="far fa-trash-alt text-danger fa-lg"></i></button>
                      </form>

                      <form action="{{route('projects.edit', $project->id)}}" method="get">
                      @csrf
                      @method('PATCH')
                      <button class="float-left" type="submit"><i class="far fa-edit text-success fa-lg ml-3"></i></button>
                      </form>
                    @endif
                  @endauth
                </small>
                </div>
            </div>
          </div>
        @endif
          
      @empty
        <div class="mx-auto col-8">
          <div class="alert alert-primary text-center" role="alert">
            لايوجد مشاريع
          </div>
        </div>          
      @endforelse
    </div>
  </div>    
@endsection