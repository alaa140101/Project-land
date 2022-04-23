@extends('layouts.main')

@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header">{{trans('main.Project details')}}</div>
              <div class="card-body">
                 <table class="table table-stribed">
                   <tr>
                     <th>{{trans('main.Project Title')}}</th>
                     <td class="lead"><b>{{app()->getLocale()== 'ar' ? $project->title_ar:$project->title_en}}</b></td>
                   </tr>
                   <tr>
                    <th>{{trans('main.Project Image')}}</th>
                    <td><img src="{{ '/storage/' . $project->project_image }}" alt="" class="img-fluid img-thumbnail"></td>
                  </tr>
                   <tr>
                    <th>{{trans('main.Details')}}</th>
                    <td>{{app()->getLocale()== 'ar' ? $project->body_ar:$project->body_en}}</td>
                  </tr> 
                 </table>
                 
              </div>
          </div>
      </div>
  </div>
</div>
@endsection
