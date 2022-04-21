@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center mt-3">
    <div class="card mb-2 col-md-8">
      <div class="card-header text-center">
        {{__('Upload Project')}}
      </div>
      <div class="card-body">
        <form action="{{ route('projects.store') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">          
            <label for="user_id">{{__('Created By')}}</label>
              <select class="form-control select2" style="width: 100%;" name="user_id">
                <option selected>Select One</option>          
                @foreach($users as $user)
                     <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach          
              </select>
          </div>
          <div class="form-group">
            <label for="project_image" class="col-md-4 col-form-label text-md-right">{{__('Project Image')}}</label>
            <div class="col-md-6">
              <input id="project_image" accept="image/*" onchange="readCoverImage(this);" type="file" class="form-control @error('project_image') is-invalid @enderror" name="project_image" value="{{ old('project_image') }}" autocomplete="project_image">
              @error('project_image')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
              <img id="project-image-thumb" class="img-fluid img-thumbnail">
            </div>
          </div>
          {{-- English inputs --}}
          <div class="form-group">
            <label for="title_en">{{__('Project Title in En ')}}</label>
            <input type="text" id="title_en"  name="title_en" value="{{ old('title_en') }}" class="form-control @error('title_en') is-invalid @enderror" >
            @error('title_en')
              <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>           
          <div class="form-group">
            <label for="body_en">{{__('Project Description in En')}}</label>
            <textarea name="body_en" id="body_en" cols="30" rows="10"class="form-control">{{ old('body_en') }}</textarea>
          </div> 
          <hr>
          {{-- Arabic inputs --}}
          <div class="form-group">
            <label for="title_ar">{{__('Project Title in Ar')}}</label>
            <input type="text" id="title_ar"  name="title_ar" value="{{ old('title_ar') }}" class="form-control @error('title_ar') is-invalid @enderror" >
            @error('title_ar')
              <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>           
          <div class="form-group">
            <label for="body_ar">{{__('Project Description in Ar')}}</label>
            <textarea name="body_ar" id="body_ar" cols="30" rows="10"class="form-control">{{ old('body_ar') }}</textarea>
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

@section('script')
  <script>
    function readCoverImage(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
          $('#project-image-thumb')
            .attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
      }
    }
  </script>
@endsection
