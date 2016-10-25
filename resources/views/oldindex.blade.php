@extends('layouts.master')
@section('title')
@endsection
@section('content')
<body id="tools">
	<h2> Tools to help with testing.</h2>
	<p> Use the form on the right to produce paragraphs with random text.  Or the 
	form on the right to produce users made from random text.  </p>
	
	
	<form method='POST' action='/lorem' id="lorem">
    	{{ csrf_field() }}
    	<label> Lorem Ipsum Generator</label>
    	<p><input type='number' name='paragraphsNumber' min="1", max="100">
    	<label for='paragraphsNumber'>How many paragraphs?</label> </p>
    	<p> <input type="checkbox" name="leaf" value="yes"> <label for="leaf">Check to use bird leaf? </label></p>
   	 	<input type='submit' value='Give me Content!'>
	</form>

	<form method='POST' action='/users' id="user">
    	{{ csrf_field() }}
    	<label> Random User Generator</label>
    	<p><input type='number' name='peopleNumber' min="1", max="20">
    	<label for='number'> How many users?</label></p>
    	<p> <input type="checkbox" name="leaf" value="yes"> <label for="leaf">Check to use bird leaf? </label></p>
    	<p> <input type="checkbox" name="highlight" value="yes"> <label for="highlight">Check to highlight? </label></p>
    	<input type='submit' value='Give me people!'>
</form>

@endsection