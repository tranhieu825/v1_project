<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

use DB;
use Carbon\Carbon;

use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\Model;



class Category extends Model
{
    protected $guarded = [];

    public function subcategory(){

        return $this->hasMany('App\Http\Controllers\Category', 'parent_id')->orderBy('position','ASC');

    }
 
}
