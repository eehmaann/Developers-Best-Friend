<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TextController extends Controller
{

    /**
    * Responds to requests to GET /books
    */
    public function one()
    {
        return view('oldindex');
    }
    
    public function lorem(Request $request)
    {
    	$this->validate($request, [
        'paragraphsNumber' => 'required|min:1|max:100|integer',
    ]);

    	return view('lorem');
    }
    public function users(Request $request)
    {
    	$this->validate($request, [
        'peopleNumber' => 'required|min:1|max:20|integer',
    ]);
    	return view ('users');
    }

} # end of class