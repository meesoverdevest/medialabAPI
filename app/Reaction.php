<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
  protected $table = "reactions";

  protected $fillable = [
		'description'
  ];

  protected $hidden = [
		'user_id'
  ];

  public function reaction()
  {
  	return $this->hasMany(Reaction::class, 'adjustment_reaction', 'adjustment_id', 'reaction_id');
  }

  public function user()
  {
  	return $this->belongsTo(User::class);
  }

  public function votes()
  {
  	return $this->hasMany(Vote::class);
  }
}
