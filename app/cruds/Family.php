<?php namespace App\cruds;

use App\cruds\BaseCRUDModel;

class Family extends BaseCRUDModel {	

	/* The database table
	*/
	protected $table = 'families';

	
	protected $guarded = array();


	const MODELS 	 = 'families';
	const TABLE_NAME = 'families';	

	/* The validation rules 
	*/
	public static $rules = array(
		'first_name' => 'required',
		'last_name' => 'required',
		'gender' => 'required',
		'employee_id' => 'required',
		'date_of_birth' => 'required',
		'nacionality' => 'required',
		'city_of_birth' => 'required',
		'marital_status' => 'required',
		'document_type' => 'required',
		'document_number' => 'required',
		'passport_number' => 'required',
		'ss_number' => 'required'
	);

	
	// pertenece a un empleado
	public function employee()
	{
		return $this->belogsTo('App\cruds\Employee');
	}


}
