<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamiliesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('families', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('first_name');
			$table->string('last_name');
			$table->enum('gender', ['f', 'm']);

			$table->date('date_of_birth');
			$table->string('nacionality',3);
			$table->string('city_of_birth');

			$table->string('marital_status');			

			$table->string('document_type');
			$table->string('document_number');
			$table->string('passport_number')->nullable();
			$table->string('ss_number');

			//Employees-Users link
			$table->integer('employee_id')->unsigned()->nullable();

			$table->timestamps();

			$table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('families');
	}

}
