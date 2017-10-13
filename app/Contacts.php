<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Contacts extends Model
{
    protected $table = 'contacts';
    protected $primaryKey = 'id';
    public $timestamps = false;

    
}
