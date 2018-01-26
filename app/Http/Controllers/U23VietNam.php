<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\U23;

class U23VietNam extends Controller
{
    public function count(){
    	$u23 = U23::find(1);

    	$u23->count = $u23->count +1;
    	$u23->update();
    	$u23->save();
    	return $u23->toArray();
    }
}
