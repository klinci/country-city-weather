<?php

use Illuminate\Database\Seeder;
use App\{Country};

class CountrySeeder extends Seeder
{

	/**
	* Run the database seeds.
	*
	* @return void
	*/
	public function run()
	{
		$data = file_get_contents('https://api.myjson.com/bins/b8dqy');
		$clean_country_with_regex = preg_replace('/\s\([a-zA-Z\s\.]+\)/', '', $data);
		$countries = json_decode($clean_country_with_regex);
		$rows = [];
		foreach ($countries as $country) {
			$rows[] = [ 'name' => $country->en ];
		}

		Country::insert($rows);
	}
}
