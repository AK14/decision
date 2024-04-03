<?php

namespace App\Http\Controllers;

use App\Models\Links;
use App\Models\User;
use App\Http\Requests\LinkCreateRequest;

use Mockery\Exception;

class LinksController extends Controller
{
    public function store(LinkCreateRequest $request)
    {
		$linkObj = new Links();
		$linkObj->short_link = $request->short_link ?? $this->generateShortLink();
		$linkObj->link = $request->link;
		$linkObj->user_id = $request->user()->id;
		$linkObj->name = $request->name;

	    try {
		    $linkObj->save();
	    }catch (\Exception $e){
			return response()->json([
				'status' => 'error',
				'ext-message' => "Link Can't save, please try again"
			], 422);
			die;
	    }
		return response()->json([
			'status'=>'success'
		],200);
    }

	public function update(LinkCreateRequest $request, string $id)
	{
		$linkObj = Links::findOrFail($id);
		$linkObj->short_link = $request->short_link ?? $this->generateShortLink();
		$linkObj->link = $request->link;
		$linkObj->user_id = $request->user()->id;
		$linkObj->name = $request->name;

		try {
			$linkObj->save();
		}catch (\Exception $e){
			return response()->json([
				'status' => 'error',
				'ext-message' => "Link Can't update, please try again"
			], 422);
			die;
		}
		return response()->json([
			'status'=>'success'
		],200);
	}

	public function destroy($id)
	{
		$link = Links::findOrFail($id);
		try {
			$link->delete();
			return response()->json([
				'status'=>'success',
				'message'=>'Link deleted successfully'
			], 200);
		}catch (Exception $e){
			return  response()->json([
				'status'=>'error',
				'message'=>"Link can't deleted, please try again"
			],422);
		}
	}

	private function generateShortLink(): string
	{
		return substr(sha1(time()), 0, 8);
	}
}
