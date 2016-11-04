@extends('layouts.app2')

@section('content')
<div  class = "dashboard-content">
    	<div class="message">{{$message}}</div>
    	<a href="{{ url('/locations') }}">Back</a>
</div>
@endsection
