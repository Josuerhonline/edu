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
		'facultad' => 'required|min_length[5]|max_length[50]',
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

	public $carreras =[
		'facultad' => 'required',
		'nombre_carrera' => 'required|is_unique[cof_carreras.nombre]',
		'nombre_corto' => 'required',
	];

	public $carrerasEditar =[
		'facultad_editar' => 'required',
		'nombre_carrera_editar' => 'required',
		'nombre_corto_editar' => 'required',
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
