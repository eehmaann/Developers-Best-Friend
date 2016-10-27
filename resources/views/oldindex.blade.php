@extends('layouts.master')
@section('title')
@endsection
@section('content')
<main id="tools">
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
	<p>  Use the form on the left to produce users made from random text, or use the form on the left to produce paragraphs with random text.  </p>
	
    <form method='POST' action='/users' id="user">
        {{ csrf_field() }}
        <label> Random User Generator</label>
        <p><input type='number' name='peopleNumber' min="1" max="20">
        <label><b> How many users?</b></label></p>
        <p> <input type="checkbox" name="address" value="yes"> <label>Check to include address </label></p>
        <p> <input type="checkbox" name="phone" value="yes"> <label>Check to include phone number </label></p>
        <p> <input type="checkbox" name="position" value="yes"> <label>Check to include job title </label></p>
        <p> <input type="checkbox" name="age" value="yes"> <label>Check to include age </label></p>
        <p> <input type="checkbox" name="leaf" value="yes"> <label>Check to use bird leaf </label></p>
        <p> <input type="checkbox" name="highlight" value="yes"> <label>Check to highlight </label></p>
        <input type='submit' value='Give me people!'>
    </form>
	
	<form method='POST' action='/lorem' id="lorem">
    	{{ csrf_field() }}
    	<label><b> Lorem Ipsum Generator</b></label>
    	<p><input type='number' name='paragraphsNumber' min="1" max="90">
    	<label>How many paragraphs?</label> </p>
    	<p> <input type="checkbox" name="leaf" value="yes"> <label>Check to use bird leaf? </label></p>
   	 	<input type='submit' value='Give me Content!'>
	</form>

</main>

@endsection