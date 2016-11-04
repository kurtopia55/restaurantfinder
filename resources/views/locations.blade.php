@extends('layouts.app2')

@section('content')
<!-- <h1 class='heading'>List of Restaurant Locations</h1>      
<a href="{{ url('/locations/new') }}">Add Locations</a> -->
 @foreach($markers as $marker)
    <paper-item>
      <paper-item-body two-line>
        <div class = "paper-item-title">{{$marker->name}}</div>
        <div secondary>
            <div style = "margin-right:10px;flex-basis:50%;">Address: {{$marker->address}}</div>
            <div style = "margin-right:10px;flex-basis:50%;">Location: <span>{{$marker->lat}}</span>, <span>{{$marker->lng}}</span></div>
        </div>
      </paper-item-body>
      <div class = "button-options">
            <a href="{{ url('/locations/remove/'.$marker->id) }}"><iron-icon icon = 'icons:delete'></iron-icon></a>
            <a href="{{ url('/locations/update/'.$marker->id) }}"><iron-icon icon = 'editor:mode-edit'></iron-icon></a>
      </div>
    </paper-item>
 @endforeach
@endsection
