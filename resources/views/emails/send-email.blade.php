@extends('layouts.main')

@section('content')
<div class="container">
  <div class="row justify-content-center mt-3">
    <div class="card mb-2 col-md-8">
      <div class="card-header text-center">
        {{__('main.Send Email')}}
      </div>
      <div class="card-body">
        <form method="POST" action="{{route('sendbulkmail.store')}}">
          @csrf
          <div class="form-group">
            <label for="title">{{__('main.Email Title')}}</label>
            <input type="text" id="title"  name="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror" >
            @error('title')
              <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div> 
          <div class="form-group">          
            <label for="message">{{__('main.Email Message')}}</label>
            <textarea class="form-control" name="message" id="message" rows="3"></textarea>
          </div>           
          <div class="form-group row mt-2">
            <div class="col-md-4">
              <button type="submit" class="btn btn-primary mt-2">{{__('main.Send')}}</button>
            </div>
          </div>
        </form>     
      </div>
    </div>
  </div>
</div>    
@endsection
