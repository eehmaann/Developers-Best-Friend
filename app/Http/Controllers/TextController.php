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
        $lorem="";
         $leaf = $request->input('leaf');
        if($leaf=="yes"){
            $lorem="<div class='birdleaf'>";
    	   $lorem.=implode('<br> BIRD LEAF ', $paragraphs);
            $lorem.="</div>";
        }
        else{            
            $lorem.=implode('<br>', $paragraphs);
        }
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
        $leaf = $request->input('leaf');
        $highlight= $request->input('highlight');

        for ($i=0; $i < $number; $i++) {
            $first =$faker->firstName($gender = null|'male'|'female');
            $last= $faker ->lastname;
            if($leaf=="yes"){
                $company="Birdleaf";
            }
            else{
                $company =$faker->company;
            }
            $email = $first.".".$last."@".$company.".com";
            $person="<b> NAME </b> \n".$first."\n".$last."\n";
            $person.="<b>EMAIL:</b>".$email."\n <b>ADDRESS</b> \n".$faker->address;
            $person.= "\n <b> NUMBER: </b> \n".$faker->phoneNumber;
            $person.= "\n <b>TITLE:</b> \n".$faker->jobTitle;
            if($i%2==0 && $highlight=="yes"){ 
            $string .="<span class='highlight'>".$person."</span>\r\n <br>";
            }
            else{
                $string .=$person."\r\n<br>";
            }
            //
        }
           
        if($leaf=="yes"){
            $string="<div class='birdleaf'>".$string."</div>";
        }
    	return view ('users')->with('string', $string);
    }

} # end of class