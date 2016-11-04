@extends('layouts.app2')

@section('content')
<div  class = "dashboard-content">
        <h1 class='heading'>Manage restaurant location</h1> 
        @if($message != '')
            <div style ="margin:10px 0;">{{$message}}</div>
        @endif
        <div class = "update-form">
             <form id="logout-form" action="" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="email" class="col-md-1 control-label">Name</label>
                    <div class="col-md-5">
                        <input id="name" type="text" class="form-control" name="name" value="{{ ($marker) ? $marker->name : '' }}" required autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-md-1 control-label">Address</label>
                    <div class="col-md-5">
                        <input id="address" type="text" class="form-control" name="address" value="{{ ($marker) ? $marker->address : '' }}" required autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-md-1 control-label">Latitude</label>
                    <div class="col-md-5">
                        <input id="latitude" type="text" class="form-control" name="latitude" value="{{ ($marker) ? $marker->lat : '' }}" required autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-md-1 control-label">Longitude</label>
                    <div class="col-md-5">
                        <input id="longitude" type="text" class="form-control" name="longitude" value="{{ ($marker) ? $marker->lng : '' }}" required autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-5 col-md-offset-1">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ url('/locations') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
</div>
@endsection
