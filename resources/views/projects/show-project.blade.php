@extends('layouts.app')

@section('content')
<div class="container">
  <h3>{{app()->getLocale()== 'ar' ? $project->title_ar:$project->title_en}}</h3>
  <hr>
  <br>

  <p>{{app()->getLocale()== 'ar' ? $project->body_ar:$project->body_en}}</p>
</div>
@endsection
