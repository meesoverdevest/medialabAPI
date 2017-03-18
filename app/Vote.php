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
  	$this->belongsTo(Reaction::class, 'reaction_id');
  }

  public function user()
  {
  	$this->belongsTo(User::class, 'user_id');
  }

}
