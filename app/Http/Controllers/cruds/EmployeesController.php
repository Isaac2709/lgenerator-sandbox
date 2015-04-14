<?php namespace App\Http\Controllers\cruds;

use Illuminate\Filesystem\Filesystem as File;
use App\Http\Controllers\cruds\BaseCRUDController;
use App\cruds\Employee;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class EmployeesController extends BaseCRUDController {

	/**
	 * Employee Repository  
	 */
	protected $employee;
	protected $models_name;
	protected $Model_name;	

	public function __construct(Employee $employee)
	{
		$this->employee  	= $employee;
		$this->models_name 	= 'employees';
		$this->Model_name 	= 'Employee';		
	}

	/*---------------*/
	public function index()
	{
		$this->setMmasterRecordInfo(); // carga la informacion de un master-record si corresponde

		$this->checkExport(); // verifica si se solicitaron exportaciones de la consulta

		$employees = $this->doUserFilter(); // construye la coleccion de datos

		return view('cruds.employees.index', $this->masterRecordArray())->with('employees', $employees); 
	}

	/*---------------*/
	public function create()
	{
		$this->setMmasterRecordInfo();

		return view('cruds.employees.create', $this->masterRecordArray());
	}


	/*---------------*/
	public function show($id)
	{
		$employee = $this->employee->findOrFail($id);

		return view('cruds.employees.show', compact('employee'));
	}


	/*---------------*/
	public function edit($id)
	{
		$this->setMmasterRecordInfo();

		$employee = $this->employee->find($id);

		if (is_null($employee))
		{
			return Redirect::route('employees.index',$this->masterRecordArray());
		}

		return view('cruds.employees.edit', array_merge(compact('employee'), $this->masterRecordArray() ));		
	}

	/*---------------*/
	public function store()
	{
		$this->setMmasterRecordInfo();

		/*valida todos los campos del formulario*/
		$input = Input::all();
		$formFields = array_except($input, array('master','master_id')); // elimina los parametros master y master_id de los campos a grabar		
		$validation = Validator::make($formFields, Employee::$rules);

		if ($validation->passes())
		{
			$formFields = array_except($formFields, $this->extraFields()); // remueve los campos extra
			$this->employee->create($formFields);

			return Redirect::route('employees.index', $this->masterRecordArray());
		}

		return Redirect::route('employees.create', $this->masterRecordArray())
			->withInput()
			->withErrors($validation)
			->with('message', trans('forms.validationErrors'));	
	}


	/*---------------*/
	public function update($id)
	{
		$this->setMmasterRecordInfo();

		/*valida todos los campos*/
		$input = array_except(Input::all(), '_method');
		$formFields = array_except($input, array('master','master_id')); // elimina los parametros master y master_id de los campos a grabar
		$validation = Validator::make($formFields, Employee::$rules);

		if ($validation->passes())
		{
			$formFields = array_except($formFields, $this->extraFields());  // remueve los campos extra
			$employee = $this->employee->find($id);
			$employee->update($formFields);

			return Redirect::route('employees.show', $this->masterRecordArray($id)  );
		}

		return Redirect::route('employees.edit', $this->masterRecordArray($id) )
			->withInput()
			->withErrors($validation)
			->with('message', trans('forms.validationErrors'));
	}


	/*---------------*/
	public function destroy($id)
	{
		$this->setMmasterRecordInfo();

		$this->employee->find($id)->delete();

		return Redirect::route('employees.index', $this->masterRecordArray());
	}

}
