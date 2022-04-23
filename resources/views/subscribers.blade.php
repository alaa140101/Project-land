@extends('layouts.main')

@section('content')
<div class="container">

    <table  class="table">
        <thead>
            <tr>
                <th scope="col">{{__('main.Emails')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($subscribers as $subscriber)
            <tr>
                <td>{{$subscriber->email}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
     {{-- Pagination --}}
     <div class="d-flex justify-content-center">
        {!! $subscribers->links() !!}
    </div>
</div>
@endsection
