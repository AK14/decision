<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Links extends Model
{
	protected $fillable = [
		'link',
		'short_name',
		'user_id',
		'short_link'
	];
	public function user()
	{
		return $this->belongsTo(User::class);
	}
	public function statistic()
	{
		return $this->belongsToMany(Statistic::class,'links_statistics','link_id','statistic_id');
	}
	public function getShortLink(): string
	{
		return env('APP_URL') .'/lnk/'.$this->short_link;
	}
}
