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
        'paragraphsNumber' => 'required|min:1|max:90|integer',
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
        'peopleNumber' => 'required|min:1|max:16|integer',
    ]);

// alternatively, use another PSR-0 compliant autoloader (like the Symfony2 ClassLoader for instance)

// use the factory to create a Faker\Generator instance


// generate data by accessing properties
//echo $faker->name;
    	$number=$request->input('peopleNumber');
        
    	$faker = Faker::create();
        $string="";
        $address=$request->input('address');
        $phone=$request->input('phone');
        $position=$request->input('position');
        $age=$request->input('age');
        $leaf = $request->input('leaf');
        $highlight= $request->input('highlight');

        for ($i=0; $i < $number; $i++) {
            $first =$faker->firstName($gender = null|'male'|'female');
            $last= $faker ->lastname;
            $person="<b> NAME: </b> &nbsp;".$first."&nbsp;".$last."&nbsp;&nbsp;";
            if($leaf=="yes"){
                $company="Birdleaf";
            }
            else if($position=="yes"){
                $company =$faker->company;
                $person.="<b>COMPANY </b> &nbsp;&nbsp;".$company;
            }
            else{
                $company="AOL";
            }
            $spacespot= strpos($company, " ");
            if($spacespot){
                $company=substr($company,0,$spacespot);
            }
            $email = $first.".".$last."@".$company.".com";
            
            $person.="<b>EMAIL:</b>  ".$email;
            if($address=="yes"){
                $person.="&nbsp;&nbsp;<b>ADDRESS:  </b> &nbsp;".$faker->address;
            }


            if($phone=="yes"){
                $person.= "&nbsp;&nbsp; <b> NUMBER:  </b> &nbsp;".$faker->phoneNumber;
            }
            if($position=="yes"){
              $person.= "&nbsp;&nbsp;<b>TITLE:  </b> &nbsp;".$faker->jobTitle;  
            }
            if($age=="yes"){
                
                   // $birthdate=$faker->date($format = 'y-m-d', $min = '-80 years', $max ='-18 years'); 
                $month =$faker->numberBetween($min = '1', $min ='12'); 
                // Get the day user was born
                if($month=="4" || $month=="6" ||$month=="9" ||$month=="11"){
                    $day = $faker->numberBetween($min = '1', $min ='30');
                } 
                else if($month="2"){
                    $day = $faker->numberBetween($min = '1', $min ='28');
                }
                else {
                    $day = $faker->numberBetween($min = '1', $min ='31');
                }
                
                // Get the year user was born, must be legal age to work
                if($leaf=="yes" || $position=="yes"){
                    $year = $faker->numberBetween($min = '1936', $min ='1998'); 
                }
                // user can be between 6 and 101
                else{
                    $year = $faker->numberBetween($min = '1915', $min ='2010'); 
                }
                $person.="<b> DATE OF BIRTH: </b>&nbsp;&nbsp;".$month."-".$day."-".$year;
            }
            
            // Changes the format of diasplay so that ever other entry is highlighted.
            if($i%2==0 && $highlight=="yes"){ 
            $string .="<span class='highlight'>".$person."</span> <br>";
            }
            else{
                $string .=$person."<br>";
            }
            //
        }
        // leaf will add a visual cue to show to be identifiably different, beyond just text
        if($leaf=="yes"){
            $string="<div class='birdleaf'> <h3>Employees of Bird Leaf</h3>".$string."</div>";
        }
    	return view ('users')->with('string', $string);
    }

} # end of class