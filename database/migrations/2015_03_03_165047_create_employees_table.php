<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('employees', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('first_name');
			$table->string('last_name');
			$table->enum('gender', ['f', 'm']);

			$table->date('date_of_birth')->nullable();
			$table->string('nacionality',3)->nullable();
			$table->string('city_of_birth')->nullable();

			$table->string('marital_status')->nullable();

			$table->string('document_type')->nullable();
			$table->string('document_number')->nullable();
			$table->string('passport_number')->nullable();
			$table->string('ss_number')->nullable();

			$table->string('country_of_residence',3)->nullable();
			$table->string('city_of_residence')->nullable();
			$table->string('street_address')->nullable();
			$table->string('street_number')->nullable();
			$table->string('phone_number')->nullable();
			$table->string('celular_number')->nullable();
			$table->string('email_adress')->nullable();	

			//Employees-Users link
			$table->integer('user_id')->unsigned()->nullable();

			$table->timestamps();


		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('employees');
	}

}
