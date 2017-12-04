<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Requests;
use DB;
use Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unit extends Model
{
	//Table name
    //protected $table = 'units';
    //Primary key
    //public $primaryKey = 'id';
    //Timestamps
    //public $timestamps = true;
    
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    
}
