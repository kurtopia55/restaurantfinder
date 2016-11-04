<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Markers extends Model{
    protected $fillable = array('name', 'address', 'lat', 'lng');

    public static function getMarkers($lat, $lng){
    	// // SELECT id,  ( 3959 * acos( cos( radians($lat) ) * cos( radians( lat ) ) * cos( radians( lng ) - radians($lng) ) + sin( radians($lat) ) * sin( radians( lat ) ) ) ) AS distance FROM markers HAVING distance < 25 ORDER BY distance LIMIT 0 , 20;
    	$markers = DB::table('markers')->select(DB::raw('name, address, lat, lng, ( 3959 * acos( cos( radians('.$lat.') ) * cos( radians( lat ) ) * cos( radians( lng ) - radians('.$lng.') ) + sin( radians('.$lat.') ) * sin( radians( lat ) ) ) ) AS distance'))
    					      ->groupBy('id')
    					      ->having('distance', '<', '25')
    					      ->orderBy('distance')
    					      ->limit(20)
    					      ->get();	
    	return $markers;
    }
}
