@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center mt-3">
    <div class="card mb-2 col-md-8">
      <div class="card-header text-center">
        رفع مشروع جديد
      </div>
      {{-- @if (auth()->user()->block) --}}
        {{-- <div class="alert alert-danger my-3" role="alert">
          للأسف غير مصرح لك
        </div> --}}
      {{-- @else  --}}
      <div class="card-body">
        <form action="{{ route('project.store') }}" method="post">
          @csrf
          <div class="form-group">
            <label for="title">{{__('Project Title')}}</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" aria-describedby="title" name="title" value="{{ old('title') }}">
            @error('title')
              <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div> 
          <div class="form-group">
            <label for="title">وصف المشروع</label>
            <textarea name="body" id="" cols="30" rows="10"class="form-control"></textarea>
          </div> 
          <div class="form-group row mt-2">
            <div class="col-md-4">
                <button type="submit" class="btn btn-secondary">رفع المشروع</button>
            </div>
          </div>
        </form>     
      </div>
      {{-- @endif --}}
    </div>
  </div>
</div>    
@endsection
