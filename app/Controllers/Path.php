<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Path extends BaseController
{
	public function index($page = FALSE, $param = FALSE)
	{
		if(! $page) return redirect()->to('/ongkir');
		else return view('app', ['page' => $page, 'param' => $param]);
	}
}