<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adjustment extends Model
{
  protected $table = "adjustments";

  protected $fillable = [
      'title', 'description', 'google_id', 
      'lat', 'lon', 'neighbourhood_id'
  ];

  public function reactions()
  {
  	return $this->belongsToMany(Reaction::class, 'adjustment_reaction', 'adjustment_id', 'reaction_id');
  }

  public function neighbourhood()
  {
  	return $this->belongsTo(Neighbourhood::class);
  }
}
