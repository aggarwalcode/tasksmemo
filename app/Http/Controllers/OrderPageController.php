<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class OrderPageController extends Controller
{
	public function orderPage()
    {
	    $email = Input::get('email');
	    $id = Input::get('id');

	    $data['emailId'] = [$email];
	    $data['fBaseId'] = [$id];

	    return view('pages.paypalform', $data);
	}
}
