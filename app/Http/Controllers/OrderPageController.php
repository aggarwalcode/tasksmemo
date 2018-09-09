<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class OrderPageController extends Controller
{
	public function orderPage()
    {
	    $id = Input::get('id');

	    $data['fBaseId'] = [$id];

	    return view('pages.paypalform', $data);
	}
}
