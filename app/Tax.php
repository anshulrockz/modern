<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Requests;
use DB;
use Auth;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Tax extends Model
{
	use SoftDeletes;
    protected $dates = ['deleted_at', 'effective_from'];
    
}
