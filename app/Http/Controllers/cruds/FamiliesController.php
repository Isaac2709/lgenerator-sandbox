<?php namespace App\Http\Controllers\cruds;

use Illuminate\Filesystem\Filesystem as File;
use App\Http\Controllers\cruds\BaseCRUDController;
use App\cruds\Family;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class FamiliesController extends BaseCRUDController {

	/**
	 * Family Repository  
	 */
	protected $family;
	protected $models_name;
	protected $Model_name;	

	public function __construct(Family $family)
	{
		$this->family  	= $family;
		$this->models_name 	= 'families';
		$this->Model_name 	= 'Family';		
	}

	/*---------------*/
	public function index()
	{
		$this->setMmasterRecordInfo(); // carga la informacion de un master-record si corresponde

		$this->checkExport(); // verifica si se solicitaron exportaciones de la consulta

		$families = $this->doUserFilter(); // construye la coleccion de datos

		return view('cruds.families.index', $this->masterRecordArray())->with('families', $families); 
	}

	/*---------------*/
	public function create()
	{
		$this->setMmasterRecordInfo();

		return view('cruds.families.create', $this->masterRecordArray());
	}


	/*---------------*/
	public function show($id)
	{
		$family = $this->family->findOrFail($id);

		return view('cruds.families.show', compact('family'));
	}


	/*---------------*/
	public function edit($id)
	{
		$this->setMmasterRecordInfo();

		$family = $this->family->find($id);

		if (is_null($family))
		{
			return Redirect::route('families.index',$this->masterRecordArray());
		}

		return view('cruds.families.edit', array_merge(compact('family'), $this->masterRecordArray() ));		
	}

	/*---------------*/
	public function store()
	{
		$this->setMmasterRecordInfo();

		/*valida todos los campos del formulario*/
		$input = Input::all();
		$formFields = array_except($input, array('master','master_id')); // elimina los parametros master y master_id de los campos a grabar		
		$validation = Validator::make($formFields, Family::$rules);

		if ($validation->passes())
		{
			$formFields = array_except($formFields, $this->extraFields()); // remueve los campos extra
			$this->family->create($formFields);

			return Redirect::route('families.index', $this->masterRecordArray());
		}

		return Redirect::route('families.create', $this->masterRecordArray())
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
		$validation = Validator::make($formFields, Family::$rules);

		if ($validation->passes())
		{
			$formFields = array_except($formFields, $this->extraFields());  // remueve los campos extra
			$family = $this->family->find($id);
			$family->update($formFields);

			return Redirect::route('families.show', $this->masterRecordArray($id)  );
		}

		return Redirect::route('families.edit', $this->masterRecordArray($id) )
			->withInput()
			->withErrors($validation)
			->with('message', trans('forms.validationErrors'));
	}


	/*---------------*/
	public function destroy($id)
	{
		$this->setMmasterRecordInfo();

		$this->family->find($id)->delete();

		return Redirect::route('families.index', $this->masterRecordArray());
	}

}
