<?php namespace App\cruds;

use App\cruds\BaseCRUDModel;

class Employee extends BaseCRUDModel {	

	/* The database table
	*/
	protected $table = 'employees';

	
	protected $guarded = array();


	const MODELS 	 = 'employees';
	const TABLE_NAME = 'employees';	

	/* The validation rules 
	*/
	public static $rules = array(
		'first_name' => 'required',
		'last_name' => 'required'
	);

	

}
