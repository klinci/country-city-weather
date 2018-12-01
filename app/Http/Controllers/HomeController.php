<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\{Country, City};

class HomeController extends Controller
{

	const countries = 'storages/json/countries.json';
	const cities = 'http://service.fajarpunya.com/storages/json/cities_and_regions/cities/';
	const owm_uri = 'http://api.openweathermap.org/data/2.5/weather?q=';

  public function index()
  {

  	if (request()->ajax()) {
			return DataTables::of(Country::all())->toJson();
  	}

  	$title = "Dashboard Page";
  		
  	return view('webadmin.admin.home', ['title' => $title]);
  }

  public function exportCity(Request $request, $name)
  {
  	try
    {
      $cleanName = str_replace(" ", "%20", $name);
      $url = self::cities.$cleanName.'.json';
      $cities = json_decode(file_get_contents($url));
      $rows = [];

      foreach ($cities->cities as $city) {

        $json = ['country_id' => $request->country_id, 'name' =>  $city->name];

        $city = City::where('unique_key', md5(json_encode($json)))->first();

        if(!$city) {
          $rows[] = [
            'country_id' => $json['country_id'],
            'name' => $json['name'],
            'unique_key' => md5(json_encode($json)),
          ];
        }
      }

      City::insert($rows);
      return [
        'error' => 0,
        'message' => 'All city inserted.'
      ];

  	} catch (\Exception $e) {
  		return [
  			'error' => 1,
  			'message' => $e->getMessage()
  		];
  	}
  }

  public function getCityByCountry()
  {
  	if (request()->ajax()) {
  		$query = City::select([
  			'countrys.name as country_name',
  			'citys.name as city_name',
  			'citys.id as city_id',
  			'countrys.id as country_id',
  		])
  		->join('countrys','countrys.id', '=','citys.country_id')
  		->get();
			return DataTables::of($query)->toJson();
  	}
  }

  public function getWeather(Request $request)
  {
  	$ch = curl_init();
		curl_setopt_array($ch, array(
			CURLOPT_URL	 			=> 	'http://api.openweathermap.org/data/2.5/weather?q='.$request->city_name.'&APPID='.config('geolocation.owm_api_key'),
			CURLOPT_RETURNTRANSFER 	=> 	1,
			CURLOPT_HEADER			=> 	0, #0 ? 1 : 0,
			CURLOPT_TIMEOUT			=> 	30,
		));

		$data 	= curl_exec($ch);
		$error 	= curl_error($ch);
		$info 	= curl_getinfo($ch);

		if($data) {
			$decode = json_decode($data);
      if($decode->cod != 404) {
        return $this->getNearby($decode);
      }
      return $data;
		} else {
			return $error;
		}
  }

  public function getNearby($request)
  {

  	$ch = curl_init();
		curl_setopt_array($ch, array(
			CURLOPT_URL	 			=> 	'https://maps.googleapis.com/maps/api/place/nearbysearch/json?location='.$request->coord->lat.','.$request->coord->lon.'&radius=200000&type=locality&key='.config('geolocation.google_api_key'),
			CURLOPT_RETURNTRANSFER 	=> 	1,
			CURLOPT_HEADER					=> 	0, #0 ? 1 : 0,
			CURLOPT_TIMEOUT					=> 	30,
		));

		$data 	= curl_exec($ch);
		$error 	= curl_error($ch);
		$info 	= curl_getinfo($ch);

		if($data) {
			// return $data;
			$decode = json_decode($data);
			return $this->getWeatherByCoordinate($decode,$request);
		} else {
			return $error;
		}
  }

  public function getWeatherByCoordinate($nearby_data,$request)
  {

  	$row['first'] = $request;
  	$result = $nearby_data->results;
  	for ($i=0; $i < count($result); $i++) {
	  	$ch[$i] = curl_init();
			curl_setopt_array($ch[$i], array(
				CURLOPT_URL	 			=> 	'http://api.openweathermap.org/data/2.5/weather?q='.$result[$i]->name.'&APPID='.config('geolocation.owm_api_key'),
				CURLOPT_RETURNTRANSFER 	=> 	1,
				CURLOPT_HEADER			=> 	0, #0 ? 1 : 0,
				CURLOPT_TIMEOUT			=> 	30,
			));
  		$row['nearbys'][$i] = json_decode(curl_exec($ch[$i]));
  		curl_close($ch[$i]);
  	}

		return $row;
  }

}
