<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;

use Illuminate\Http\Request; 

class SearchController extends Controller
{
   public function search()
    {
        $email = Input::get('email', 'ashishaggarwal199611@gmail.com');
        $id = Input::get('id', false);

        $data['emailIdArr'] = [$email];
        $data['fBaseIdArr'] = [$id];

        return view('pages.search', $data);
    }
}
