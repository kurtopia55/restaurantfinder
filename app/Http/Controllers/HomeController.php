<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Markers;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('home', ['page' => 'home']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewLocations(){
        $data = ['markers' => Markers::all(), 'page' => 'locations'];
        return view('locations', $data);
    }

    public function newLocation(Request $request){
        $message = '';

        if($request->isMethod('post')){
            $marker                   = new Markers;
            $marker->name       = $request->name;
            $marker->address   = $request->address;
            $marker->lat            = $request->latitude;
            $marker->lng           = $request->longitude;
            $successful              = $marker->save();

            if($successful){
                $message = "You have successfully inserted ".$request->name;
            }
        }

        $data = ['marker' => false, 'message' => $message, 'page' => 'new'];
        return view('update_location', $data);
    }


    public function updateLocation(Request $request, $id){
        $marker     = Markers::find($id);
        $message = '';

        if($request->isMethod('post')){
            $marker->name        = $request->get('name');
            $marker->address    = $request->get('address');
            $marker->lat             = $request->get('latitude');
            $marker->lng            = $request->get('longitude');
            $successful               = $marker->save();

            if($successful){
                $message = "You have successfully updated ".$request->get('name');
            }
        }

        $data = ['marker' => $marker, 'message' => $message, 'page' => 'update'];
        return view('update_location', $data);
    }

    public function removeLocation($id){
        $affectedRows = Markers::where('id', '=', $id)->delete();

        return view('successful', ['action' =>'delete', 'message' => (($affectedRows > 0) ? 'You have successfully deleted this location!' : 'There is no markers to delete!'), 'page' => 'remove']);
    }
}
