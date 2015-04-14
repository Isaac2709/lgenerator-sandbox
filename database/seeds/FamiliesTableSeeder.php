<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\cruds\Employee;

class FamiliesTableSeeder extends Seeder {

    public function run()
    {
    	$faker=Faker::create('es_AR');

    	$employees=Employee::all();

    	foreach ($employees as $employee) {

    		$cantidad=rand(0,6);

    		for ($i=0; $i < $cantidad ; $i++) { 

	    		$s=rand(0,9);
		    	if($s>4){
		    		$gender='male';
		    		$cuit='20';
		    	}else{
		    		$gender='female'; 
		    		$cuit='27';
		    	}

		        DB::table('families')->insert(array(
		        	'first_name' => $faker->firstName($gender),
		        	'last_name' => $faker->lastName.' '.$employee->last_name,
		        	'gender' => substr($gender, 0,1),

					'date_of_birth' => $faker->dateTimeBetween('-30 years', '-1 years'),
		        	'nacionality' => $faker->CountryISOAlpha3,
		        	'city_of_birth' => $faker->CountryISOAlpha3,//country,

					'document_type' => 'DNI',
					'document_number' => $faker->numberBetween(17000000,35000000),
					'passport_number' => $faker->swiftBicNumber,
					'ss_number' => $cuit.$faker->numberBetween(17000000,35000000).$s,

					'employee_id' => $employee->id,

		        	)
		        );
	    	}
    	}
    }
}