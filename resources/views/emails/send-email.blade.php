@extends('layouts.app')

@section('content')

  <div class="container p-3">
    <div class="row">
      <div class="col-8">      
        <form method="POST" action="{{route('sendbulkmail.store')}}">
          @csrf
          <div class="form-group">
            <label for="title">{{__('Title')}}</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Title">
          </div>    
          <div class="form-group">
            <label for="message">{{__('Message')}}</label>
            <textarea class="form-control" name="message" id="message" rows="3"></textarea>
          </div>
          <button type="submit" class="btn btn-primary mt-2">{{__('Send')}}</button>
        </form>
      </div>
    </div>
  </div>
@endsection