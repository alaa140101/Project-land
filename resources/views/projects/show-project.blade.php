@extends('layouts.app')

@section('content')
<div class="container">
  <h3>{{ $project->title}}</h3>
  <hr>
  <br>

  <p>{{$project->body}}</p>
</div>
@endsection
