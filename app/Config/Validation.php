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

	//Validaciones de prueba
	public $movies =[
		'title' => 'required|min_length[3]|max_length[255]',
		'description' => 'min_length[3]|max_length[5000]'
	];
	public $categories =[
		'title' => 'required|min_length[3]|max_length[255]'
	];

	//Validaciones para Cambio de clave
	public $cambioClave =[
		'nClave' => 'required',
	];
	public $cambioClave_errors = [
		'nClave' => [
			'required'    => 'Por favor, ingrese la Nueva Contraseña.',
		],
	];

	//Validaciones para Usuarios
	public $users =[
		'usuario' => 'required|min_length[3]|max_length[20]|is_unique[cof_usuarios.usuario]',
		'clave' => 'required|min_length[5]|max_length[25]'
	];
	public $users_errors = [
		'usuario' => [
			'required'   => 'Por favor, ingrese el Usuario.',
			'min_length' => 'El usuario debe ser mayor a tres caracteres. Intente nuevamente.',
			'max_length' => 'El usuario debe ser menor a veinte caracteres. Intente nuevamente.',
			'is_unique'  => 'El usuario ingresado, ya existe en la base de datos. Intente Nuevamente.'
		],
		'clave' => [
			'required'   => 'Por favor, ingrese la Contraseña.',
			'min_length' => 'La contraseña debe ser mayor a cinco caracteres. Intente nuevamente.',
			'max_length' => 'La contraseña debe ser menor a veinticinco caracteres. Intente nuevamente.',
		],
	];

	public $userUpdate =[
		'usuario' => 'required|min_length[3]|max_length[20]',
		'clave'   => 'required|min_length[5]|max_length[25]'
	];
	public $userUpdate_errors = [
		'usuario' => [
			'required'   => 'Por favor, ingrese el Usuario.',
			'min_length' => 'El usuario debe ser mayor a tres caracteres. Intente nuevamente.',
			'max_length' => 'El usuario debe ser menor a veinte caracteres. Intente nuevamente.'
		],
		'clave' => [
			'required'   => 'Por favor, ingrese la Contraseña.',
			'min_length' => 'La contraseña debe ser mayor a cinco caracteres. Intente nuevamente.',
			'max_length' => 'La contraseña debe ser menor a veinticinco caracteres. Intente nuevamente.',
		],
	];

	//Validaciones para Personas
	public $personaUpdate =[
		'DUI'             => 'required|min_length[10]|max_length[10]',
		'carnet'          => 'required|min_length[4]|max_length[15]',
		'nombres'         => 'required|min_length[3]|max_length[50]',
		'apellidos'       => 'required|min_length[3]|max_length[50]',
		'telefono'        => 'required|min_length[9]|max_length[9]',
		'email'           => 'required|valid_email',
		'fechaNacimiento' => 'required'
	];
	public $personaUpdate_errors = [
		'DUI' => [
			'required'   => 'Por favor, ingrese el DUI de la persona.',
			'min_length' => 'El DUI debe ser igual a diez caracteres. Intente nuevamente.',
			'max_length' => 'El DUI debe ser igual a diez caracteres. Intente nuevamente.'
		],
		'carnet' => [
			'required'   => 'Por favor, ingrese el Carné de la persona.',
			'min_length' => 'El Carné debe ser mayor a cuatro caracteres. Intente nuevamente.',
			'max_length' => 'El Carné debe ser menor a quince caracteres. Intente nuevamente.'
		],
		'nombres' => [
			'required'   => 'Por favor, ingrese el Nombre de la persona.',
			'min_length' => 'El Nombre de la persona debe ser mayor a tres caracteres. Intente nuevamente.',
			'max_length' => 'El Nombre de la persona debe ser menor a cincuenta caracteres. Intente nuevamente.'
		],
		'apellidos' => [
			'required'   => 'Por favor, ingrese el Apellido de la persona.',
			'min_length' => 'El Apellido de la persona debe ser mayor a tres caracteres. Intente nuevamente.',
			'max_length' => 'El Apellido de la persona debe ser menor a cincuenta caracteres. Intente nuevamente.'
		],
		'telefono' => [
			'required'   => 'Por favor, ingrese el Teléfono de la persona.',
			'min_length' => 'El Teléfono de la persona debe ser igual a nueve caracteres. Intente nuevamente.',
			'max_length' => 'El Teléfono de la persona debe ser igual a nueve caracteres. Intente nuevamente.'
		],
		'email' => [
			'required'    => 'Por favor, ingrese el Correo Electrónico de la persona.',
			'valid_email' => 'Por favor, ingrese un Correo Electrónico válido. Intente nuevamente.',
		],
		'fechaNacimiento' => [
			'required'    => 'Por favor, ingrese la Fecha de Nacimiento de la persona.',
		],
	];

	//Validaciones para Facultad
	public $facultad =[
		'facultad' => 'required|is_unique[cof_facultad.facultad]|min_length[5]|max_length[50]',
	];
	public $facultad_errors = [
		'facultad' => [
			'required'   => 'Por favor, ingrese el nombre de la Facultad.',
			'is_unique' => 'La facultad ya existe en la base de datos. Intente nuevamente.',
			'min_length' => 'El nombre de la facultad debe ser mayor a cinco caracteres. Intente nuevamente.',
			'max_length' => 'El nombre de la facultad debe ser menor a cincuenta caracteres. Intente nuevamente.'
		],
	];

	public $facultadEditar =[
		'facultad_editar' => 'required|min_length[5]|max_length[50]'
	];
	public $facultadEditar_errors = [
		'facultad_editar' => [
			'required'   => 'Por favor, ingrese el nombre de la Facultad.',
			'min_length' => 'El nombre de la facultad debe ser mayor a cinco caracteres. Intente nuevamente.',
			'max_length' => 'El nombre de la facultad debe ser menor a cincuenta caracteres. Intente nuevamente.'
		],
	];

	//Validaciones para Universidad
	public $universidad =[
		'nombre_universidad' => 'required|is_unique[cof_universidad.universidad]',
		'direccion' => 'required',
		'telefono' => 'required|min_length[9]',
	];
	
	public $universidad_errors = [
		'nombre_universidad' => [
			'required'    => 'POR FAVOR, INGRESE EL NOMBRE DE LA UNIVERSIDAD.',
		],
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
	public $ciclo_errors = [
        'ciclo' => [
            'required'    => 'Por favor, ingrese el Ciclo.',
        ],
        'anio'    => [
            'required' => 'Por favor, ingrese el Año para el ciclo.'
        ]
        ,
        'nombrePersonalizado'    => [
            'required' => 'Por favor, ingrese el Nombre Personalizado.'
        ]
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
