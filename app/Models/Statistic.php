<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
	protected $fillable = [
		'consumer_ip',
		'location',
		'device'
	];

	public function links()
	{
		return $this->belongsToMany(Links::class, 'links_statistics','statistic_id','link_id');
	}
}
