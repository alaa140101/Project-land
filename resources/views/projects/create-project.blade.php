@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center mt-3">
    <div class="card mb-2 col-md-8">
      <div class="card-header text-center">
        {{__('Upload Project')}}
      </div>
      <div class="card-body">
        <form action="{{ route('projects.store') }}" method="post">
          @csrf
          <div class="form-group">
            <label for="title">{{__('Project Title')}}</label>
            <input type="text" id="title"  name="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror" >
            @error('title')
              <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div> 
          <div class="form-group">          
            <label for="user_id">{{__('Users')}}</label>
              <select class="form-control select2" style="width: 100%;" name="user_id">
                <option selected>Select One</option>          
                @foreach($users as $user)
                     <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach          
              </select>
          </div>
          <div class="form-group">
            <label for="body">{{__('description')}}</label>
            <textarea name="body" id="body" cols="30" rows="10"class="form-control"></textarea>
          </div> 
          <div class="form-group row mt-2">
            <div class="col-md-4">
                <button type="submit" class="btn btn-secondary">{{__('Upload')}}</button>
            </div>
          </div>
        </form>     
      </div>
    </div>
  </div>
</div>    
@endsection
