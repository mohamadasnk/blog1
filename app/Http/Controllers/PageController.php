<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function contact(){
          $title= "Contact Page";
        return view('pages.contact')->with('title', $title);

    }

    public function home(){

        return view('pages.home');

}


}
