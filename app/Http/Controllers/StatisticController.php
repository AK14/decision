<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Links;
use App\Models\Statistic;

class StatisticController extends Controller
{
    public function redirect(Request $request, $lnk)
    {
		if($link = Links::where('short_link',$lnk)->first())
		{
			$statisticEL = new Statistic();
			$statisticEL->consumer_ip = $request->ip();
			$statisticEL->location = $request->getLocale();
			$statisticEL->device = $request->header('User-Agent');
			$statisticEL->save();
			$statisticEL->links()->sync($link->id);

			return redirect($link->link);
		}
    }
}
