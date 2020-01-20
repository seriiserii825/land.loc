<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Page;
use App\Service;
use App\Portfolio;
use App\People;

class IndexController extends Controller
{
	public function execute(Request $request){
		$pages = Page::all();
		$portoflios = Portfolio::get(['name', 'image', 'filter']);
		$services = Service::all();
		$peoples = People::take(3)->get();
		return view('front.index');
	}
}
