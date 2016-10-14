<?php

namespace project2\Http\Controllers;

use Illuminate\Http\Request;

use project2\Http\Requests;

 class TagController extends Controller
{
 public function index()
    {
        //
        return view('oldindex');
    }
 }

public function lorem()
	{// use the packages to get lorem
		return view('lorem');
	}

public function user()
	{
		//use the packages to generate users
		return view('user');
	} 