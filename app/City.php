<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
	protected $table = 'citys';
  protected $fillable = ['country_id','name','unique_key'];

  public function country() {
  	return $this->belongsTo(Country::class);
  }
}
