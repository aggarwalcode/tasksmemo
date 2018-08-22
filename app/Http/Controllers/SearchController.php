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

        // do things with them...
        /*return "<strong>Your Email Id is: </strong>".$_GET['email']."<br /><br /> <strong>Your Unique Id is: </strong>".$_GET['id'];*/

        $data['emailIdArr'] = [$email];
        $data['fBaseIdArr'] = [$id];

        return view('pages.search', $data);
    }
}
