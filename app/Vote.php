<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
  protected $table = "upvotes";

  protected $fillable = [
      'vote'
  ];

  protected $hidden = [
    'user_id',
    'reaction_id',
  ];

  public function reaction()
  {
  	return $this->belongsTo(Reaction::class, 'reaction_id');
  }

  public function user()
  {
  	return $this->belongsTo(User::class, 'user_id');
  }

}
