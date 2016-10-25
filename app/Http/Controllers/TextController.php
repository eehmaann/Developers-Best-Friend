<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Faker\Factory as Faker;

// require the Faker autoloader
// Find where the autoloader is
// require_once '/vendor/fzaninotto/faker/src/autoload.php';

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
		$number= $request->input('paragraphsNumber');
		$generator = new \Badcow\LoremIpsum\Generator();
		$paragraphs = $generator->getParagraphs($number);
		//echo implode('<p>', $paragraphs);
    	$lorem =implode('<br> BIRD LEAF ', $paragraphs);
        return view('lorem')->with('lorem', $lorem);
    }
    public function users(Request $request)
    {
    	$this->validate($request, [
        'peopleNumber' => 'required|min:1|max:20|integer',
    ]);

// alternatively, use another PSR-0 compliant autoloader (like the Symfony2 ClassLoader for instance)

// use the factory to create a Faker\Generator instance


// generate data by accessing properties
//echo $faker->name;
    	$number=$request->input('peopleNumber');
        
    	$faker = Faker::create();
        $string="";

        for ($i=0; $i < $number; $i++) {
            $first =$faker->firstName($gender = null|'male'|'female');
            $last= $faker ->lastname;
            $company =$faker->company;
            $email = $first.".".$last."@".$company.".com";
            //$string .= $faker ->name($gender = null|'male'|'female');
            $string .="<b> NAME </b>";
            $string .=$first;
            $string .="\n";
            $string .=$last."\n<b>EMAIL:</b>".$email."\n <b>ADDRESS</b> \n";
  			$string .=  $faker->address;
            $string .= "\n <b> NUMBER </b> \n";
    		$string .=  $faker->phoneNumber;
            $string .= "\n TITLE \n";
    		$string .=  $faker->jobTitle;
            $string .="\r\n <br>";
            //
        }
    		
    	return view ('users')->with('string', $string);
    }

} # end of class