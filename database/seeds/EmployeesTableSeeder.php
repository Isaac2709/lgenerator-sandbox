<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class EmployeesTableSeeder extends Seeder {

    public function run()
    {
    	$faker=Faker::create('es_AR');

    	for ($i=0; $i < 50 ; $i++) { 

	    	$s=rand(0,9);
	    	if($s>4){
	    		$gender='male';
	    		$cuit='20';
	    	}else{
	    		$gender='female'; 
	    		$cuit='27';
	    	}

	    	if($s>8){
	    		$marital_status='married';
	    	}else{
	    		$marital_status='not married';
	    	}

	    	$username=$faker->userName;

	        DB::table('employees')->insert(array(
	        	'first_name' => $faker->firstName($gender),
	        	'last_name' => $faker->lastName,
	        	'gender' => substr($gender, 0,1),
				'date_of_birth' => $faker->dateTimeBetween('-50 years', '-21 years'),

	        	'street_address' => $faker->streetName,
	        	'street_number' => $faker->buildingNumber,
	        	'country_of_residence' => $faker->CountryISOAlpha3,
	        	'city_of_residence' => $faker->CountryISOAlpha3,//country,
	        	'phone_number' =>$faker->phoneNumber,
	        	'celular_number' =>$faker->phoneNumber,
	        	'email_adress' =>$faker->safeEmail,

				'marital_status' => $marital_status,

				'document_type' => 'DNI',
				'document_number' => $faker->numberBetween(17000000,35000000),
				'passport_number' => $faker->swiftBicNumber,
				'ss_number' => $cuit.$faker->numberBetween(17000000,35000000).$s,
				

	        	));

    	}

        
    }

}