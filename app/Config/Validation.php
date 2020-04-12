<?php namespace Config;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
	];

	public $movies =[
		'title' => 'required|min_length[3]|max_length[255]',
		'description' => 'min_length[3]|max_length[5000]'
	];
	public $cheta =[
		'nClave' => 'required',
		
	];

	public $categories =[
		'title' => 'required|min_length[3]|max_length[255]'
	];

	public $users =[
		'usuario' => 'required|min_length[3]|max_length[255]|is_unique[cof_usuarios.usuario]',
		'clave' => 'required|min_length[5]|max_length[25]'
	];

	public $userUpdate =[
		'clave' => 'required|min_length[5]|max_length[25]'
	];

	public $personaUpdate =[
		'DUI' => 'required|min_length[5]|max_length[25]'
	];

	public $facultad =[
		'facultad' => 'required|is_unique[cof_facultad.facultad]',
	];
	
	public $facultadEditar =[
		'facultad_editar' => 'required|min_length[5]|max_length[50]'
	];

	public $universidad =[
		'nombre_universidad' => 'required|is_unique[cof_universidad.universidad]',
		'direccion' => 'required',
		'telefono' => 'required|min_length[9]',
	];

	public $universidadEditar =[
		'nombre_universidad_editar' => 'required',
		'direccion_editar' => 'required',
		'telefono_editar' => 'required|min_length[9]',
	];
	public $plan =[
		'plan' => 'required|is_unique[cof_planes.nombrePlan]',
		'planAcuerdo' => 'required|min_length[3]',
	];
	public $planEditar =[
		'plan_editar' => 'required|min_length[3]',
		'planAcuerdo_editar' => 'required|min_length[3]',
	];
	public $ciclo =[
		'ciclo' => 'required|is_unique[cof_aper_ciclo.ciclo]',
		'anio' => 'required|min_length[3]',
		'nombrePersonalizado' => 'required|is_unique[cof_aper_ciclo.nombrePersonalizado]',
		'fechaInicio' => 'required',
		'fechaFin' => 'required',
	];
	public $cicloEditar =[
		'ciclo_editar' => 'required',
		'anio_editar' => 'required|min_length[3]',
		'nombrePersonalizado_editar' => 'required|min_length[3]',
		'fechaInicio_editar' => 'required',
		'fechaFin_editar' => 'required',
	];
	
	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	public $templates = [
		//'list'   => 'CodeIgniter\Validation\Views\list',
		'list'   => 'App\Views\Validations\list_bootstrap',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------
}
