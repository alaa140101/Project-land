@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center mt-3">
    <div class="card mb-2 col-md-8">
      <div class="card-header text-center">
        {{__('Upload Project')}}
      </div>
      <div class="card-body">
        <form action="{{ route('project.update', $project->id) }}" method="post">
          @csrf
          @method('PATCH')
          <div class="form-group">
            <label for="title">{{__('Project Title')}}</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" aria-describedby="title" name="title" value="{{ $project->title }}">
            @error('title')
              <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>           
          <div class="form-group">
            <label for="body">{{__('description')}}</label>
            <textarea name="body" id="body" cols="30" rows="10"class="form-control">{{ $project->body }}</textarea>
          </div> 
          <div class="form-group row mt-2">
            <div class="col-md-4">
                <button type="submit" class="btn btn-secondary">{{__('Edit')}}</button>
            </div>
          </div>
        </form>     
      </div>
    </div>
  </div>
</div>    
@endsection
