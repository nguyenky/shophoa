<?php

namespace App\Http\Controllers\Api\SitePublic;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tags;
// use re
class PublicApiController extends Controller
{
    public function get_mini_categories(){
    	$tags = Tags::all();
    	return response()->json(['status' => true, 'data' => $tags]);
    }
}
