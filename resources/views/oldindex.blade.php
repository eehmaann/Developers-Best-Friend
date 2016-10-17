@extends('layouts.master')
@section('title')
@endsection
@section('content')
<h1> Tools to use.</h1>
<p> Use either one of the forms to produce random content.  Select the number of paragaphs of random text that you would like to have produce and then press "Give me Content".  Or select the number of random users that you would like created, and the press "Give me people!"</p>
<form method='POST' action='/lorem'>
    {{ csrf_field() }}
    <p> How many paragraphs would you like? <input type='number' name='paragraphsNumber' min="1", max="100">
    <input type='submit' value='Give me Content!'></p>
</form>

<form method='POST' action='/users'>
    {{ csrf_field() }}
    <p> How many users would you like to have generated?<input type='number' name='peopleNumber' min="1", max="20">
    <input type='submit' value='Give me people!'></p>
</form>

@endsection