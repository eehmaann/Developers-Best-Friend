@extends('layouts.master')
@section('title')
@endsection
@section('content')
<body id="tools">
	<h2> Tools to help with testing.</h2>
	@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
	<p>  Use form on the right to produce users made from random text, or use the form on the left to produce paragraphs with random text.  </p>
	
    <form method='POST' action='/users' id="user">
        {{ csrf_field() }}
        <label> Random User Generator</label>
        <p><input type='number' name='peopleNumber' min="1", max="20">
        <label for='number'> How many users?</label></p>
        <p> <input type="checkbox" name="address" value="yes"> <label for="address">Check to include address </label></p>
        <p> <input type="checkbox" name="phone" value="yes"> <label for="phone">Check to include phone number </label></p>
        <p> <input type="checkbox" name="position" value="yes"> <label for="position">Check to include job title </label></p>
        <p> <input type="checkbox" name="age" value="yes"> <label for="age">Check to include age </label></p>
        <p> <input type="checkbox" name="leaf" value="yes"> <label for="leaf">Check to use bird leaf </label></p>
        <p> <input type="checkbox" name="highlight" value="yes"> <label for="highlight">Check to highlight </label></p>
        <input type='submit' value='Give me people!'>
    </form>
	
	<form method='POST' action='/lorem' id="lorem">
    	{{ csrf_field() }}
    	<label> Lorem Ipsum Generator</label>
    	<p><input type='number' name='paragraphsNumber'>
    	<label for='paragraphsNumber'>How many paragraphs?</label> </p>
    	<p> <input type="checkbox" name="leaf" value="yes"> <label for="leaf">Check to use bird leaf? </label></p>
   	 	<input type='submit' value='Give me Content!'>
	</form>



@endsection