<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class aboutusController extends Controller
{
    //ABOUTUS
    public function aboutus() {
        //echo "About us com Controller!";
        return view('site.aboutus');
    }
}
