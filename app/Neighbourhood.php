<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Neighbourhood extends Model
{
  protected $table = "neighbourhoods";

  protected $fillable = [
      'title', 'description', 'google_id'
  ];

  public function users()
  {
  	return $this->hasMany(User::class);
  }

	public function adjustments()
  {
  	return $this->hasMany(Adjustment::class);
  }  

}
