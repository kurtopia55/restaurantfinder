<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Markers;

class LocationsController extends Controller{
    
	public function viewMap(){
		return view('welcome');
	}

	public function searchLocations(Request $request){
		return Markers::getMarkers($request->get('lat'), $request->get('lng'));
	}

}
