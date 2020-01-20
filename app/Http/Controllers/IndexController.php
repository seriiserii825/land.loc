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

		$menu = [];

		foreach($pages as $page){
			$menu_item = ['title' => $page['name'], 'alias' => $page['alias']];
			array_push($menu, $menu_item);
		}

		$menu_item = ['title' => 'Services', 'alias' => 'service'];
		array_push($menu, $menu_item);

		$menu_item = ['title' => 'Portfolio', 'alias' => 'portfolio'];
		array_push($menu, $menu_item);

		$menu_item = ['title' => 'Clients', 'alias' => 'clients'];
		array_push($menu, $menu_item);

		$menu_item = ['title' => 'Team', 'alias' => 'team'];
		array_push($menu, $menu_item);

		$menu_item = ['title' => 'Contact', 'alias' => 'contact'];
		array_push($menu, $menu_item);

		return view('front.index', [
			'menu' => $menu,
			'pages' => $pages,
			'services' => $services,
			'portfolios' => $portoflios,
			'$peoples' => $peoples,
		]);
	}
}
