<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobPosting extends Model
{
  protected $fillable = [
    'summary', 'body', 'user_id'
  ];

  public function user(){
    return $this->belongsTo(User::class);
  }

  public function interestedUsers()
  {
      return $this->belongsToMany(User::class);
  }
}
