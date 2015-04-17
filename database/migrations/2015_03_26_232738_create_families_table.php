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
				$table->enum('gender', ['f', 'm'])->nullable();

				$table->string('photo')->nullable();

				$table->date('date_of_birth')->nullable();
				$table->string('nacionality',3)->nullable();
				$table->string('city_of_birth')->nullable();

				$table->string('marital_status')->nullable();	

				$table->string('document_type')->nullable();
				$table->string('document_number')->nullable();
				$table->string('passport_number')->nullable();
				$table->string('ss_number')->nullable();

				//Employees link
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
