<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recordpledge extends Model
{
   public function user() {

   		return $this->belongsToMany('App\User', 'breakdowns');

   }
	protected $table = 'recordpledge';
}
