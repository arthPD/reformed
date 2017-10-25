<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Breakdown extends Model
{
    //this is the pivot table/model

    protected $fillable = ['recordpledge_id', 'user_id','ones','fives','tens','twenties','fifties','hundreds','two_hundreds','five_hundreds','thousands'];
}
