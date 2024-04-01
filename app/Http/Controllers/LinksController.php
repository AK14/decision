<?php

namespace App\Http\Controllers;

use App\Models\Links;
use App\Models\User;
use Illuminate\Http\Request;

class LinksController extends Controller
{
    public function store(Request $request)
    {
	    $request->validate([
		    'link' => 'required|max:500',
		    'short_link' => 'unique:links,short_link'
	    ]);

		$linkObj = new Links();
		$linkObj->short_link = $this->generateShortLink( $request->short_link );
		$linkObj->link = $request->link;
		$linkObj->user_id = $request->user()->id;
		$linkObj->name = $request->name;

		$linkObj->save();

		return response()->json([
			'status'=>'success'
		],200);
    }

	private function generateShortLink($str = ''): string
	{
		if($str === ''){
			$str = substr(sha1(time()), 0, 8);
		}
		return env('APP_URL').'/lnk/'. $str;
	}

}
