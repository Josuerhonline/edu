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
			'is_unique'  => 'La facultad ya existe en la base de datos. Intente nuevamente.',
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
		'direccion' => 'required|min_length[10]|max_length[250]',
		'telefono'  => 'required|min_length[9]|max_length[9]',
	];
	public $universidad_errors = [
		'nombre_universidad' => [
			'required'  => 'Por favor, ingrese el nombre de la Universidad.',
			'is_unique' => 'Lo sentimos, la Universidad ya existe en la base de datos. Intente nuevamente.'
		],
		'direccion' => [
			'required'  => 'Por favor, ingrese la dirección de la Universidad.',
			'min_length' => 'La dirección de la universidad debe ser mayor a diez caracteres. Intente nuevamente.',
			'max_length' => 'La dirección de la universidad debe ser menor a doscientos cincuenta caracteres. Intente nuevamente.'
		],
		'telefono' => [
			'required'   => 'Por favor, ingrese el Teléfono de la universidad.',
			'min_length' => 'El Teléfono de la universidad debe ser igual a nueve caracteres. Intente nuevamente.',
			'max_length' => 'El Teléfono de la universidad debe ser igual a nueve caracteres. Intente nuevamente.'
		]
	];

	public $universidadEditar =[
		'nombre_universidad_editar' => 'required',
		'direccion_editar'          => 'required|min_length[10]|max_length[250]',
		'telefono_editar'           => 'required|min_length[9]|max_length[9]',
	];
	public $universidadEditar_errors = [
		'nombre_universidad_editar' => [
			'required'  => 'Por favor, ingrese el nombre de la Universidad.'
		],
		'direccion_editar' => [
			'required'   => 'Por favor, ingrese la dirección de la Universidad.',
			'min_length' => 'La dirección de la universidad debe ser mayor a diez caracteres. Intente nuevamente.',
			'max_length' => 'La dirección de la universidad debe ser menor a doscientos cincuenta caracteres. Intente nuevamente.'
		],
		'telefono_editar' => [
			'required'   => 'Por favor, ingrese el Teléfono de la universidad.',
			'min_length' => 'El Teléfono de la universidad debe ser igual a nueve caracteres. Intente nuevamente.',
			'max_length' => 'El Teléfono de la universidad debe ser igual a nueve caracteres. Intente nuevamente.'
		]
	];

	//Validaciones para Planes
	public $plan =[
		'plan'        => 'required|is_unique[cof_planes.nombrePlan]',
		'planAcuerdo' => 'required|min_length[3]',
	];
	public $plan_errors = [
		'plan' => [
			'required'  => 'Por favor, ingrese el nombre del Plan.',
			'is_unique' => 'Lo sentimos este Plan ya existe en la base de datos. Intente nuevamente.'
		],
		'planAcuerdo'    => [
			'required'   => 'Por favor, ingrese el Plan Acuerdo para el Plan.',
			'min_length' => 'El Plan Acuerdo debe ser mayor a tres caracteres. Intente nuevamente.'
		]
	];

	public $planEditar =[
		'plan_editar'        => 'required|min_length[3]',
		'planAcuerdo_editar' => 'required|min_length[3]',
	];
	public $planEditar_errors = [
		'plan_editar' => [
			'required'   => 'Por favor, ingrese el nombre del Plan.',
			'min_length' => 'El Plan debe ser mayor a tres caracteres. Intente nuevamente.'
		],
		'planAcuerdo_editar'    => [
			'required'   => 'Por favor, ingrese el Plan Acuerdo para el Plan.',
			'min_length' => 'El Plan Acuerdo debe ser mayor a tres caracteres. Intente nuevamente.'
		]
	];

	//Validaciones para Ciclos
	public $ciclo =[
		'ciclo'               => 'required|min_length[1]|max_length[1]',
		'anio'                => 'required|min_length[4]|max_length[4]',
		'nombrePersonalizado' => 'required|is_unique[cof_aper_ciclo.nombrePersonalizado]',
		'fechaInicio'         => 'required',
		'fechaFin'            => 'required',
	];
	public $ciclo_errors = [
		'ciclo' => [
			'required'   => 'Por favor, ingrese el Ciclo.',
			'min_length' => 'El Ciclo debe tener un caracter (Ej: 1). Intente nuevamente.',
			'max_length' => 'El Ciclo debe tener un caracter (Ej: 1). Intente nuevamente.'
		],
		'anio' => [
			'required'   => 'Por favor, ingrese el Año para el ciclo.',
			'min_length' => 'El Año debe tener cuatro caracteres (Ej: 2020). Intente nuevamente.',
			'max_length' => 'El Año debe tener cuatro caracteres (Ej: 2020). Intente nuevamente.'
		]
		,
		'nombrePersonalizado' => [
			'required'  => 'Por favor, ingrese el Nombre Personalizado.',
			'is_unique' => 'Lo sentimos el Nombre Personalizado ya existe en la base de datos. Intente nuevamente.'
		],
		'fechaInicio' 			=> [
			'required'  => 'Por favor, ingrese la Fecha de Inicio.'
		],
		'fechaFin' => [
			'required'  => 'Por favor, ingrese la Fecha de Finalización.'
		]
	];
	
	public $cicloEditar =[
		'ciclo_editar'               => 'required|min_length[1]|max_length[1]',
		'anio_editar'                => 'required|min_length[4]|max_length[4]',
		'nombrePersonalizado_editar' => 'required|min_length[3]',
		'fechaInicio_editar'         => 'required',
		'fechaFin_editar'            => 'required',
	];
	public $cicloEditar_errors = [
		'ciclo_editar' => [
			'required'   => 'Por favor, ingrese el Ciclo.',
			'min_length' => 'El Ciclo debe tener un caracter (Ej: 1). Intente nuevamente.',
			'max_length' => 'El Ciclo debe tener un caracter (Ej: 1). Intente nuevamente.'
		],
		'anio_editar' => [
			'required'   => 'Por favor, ingrese el Año para el ciclo.',
			'min_length' => 'El Año debe tener cuatro caracteres (Ej: 2020). Intente nuevamente.',
			'max_length' => 'El Año debe tener cuatro caracteres (Ej: 2020). Intente nuevamente.'
		]
		,
		'nombrePersonalizado_editar' => [
			'required'   => 'Por favor, ingrese el Nombre Personalizado.',
			'min_length' => 'El nombre personalizado debe ser mayor a tres caracteres. Intente nuevamente.'
		],
		'fechaInicio_editar' 			=> [
			'required'  => 'Por favor, ingrese la Fecha de Inicio.'
		],
		'fechaFin_editar' => [
			'required'  => 'Por favor, ingrese la Fecha de Finalización.'
		]
	];

	//Validaciones para Carreras
	public $carreras =[
		'facultad'       => 'required',
		'nombre_carrera' => 'required|is_unique[cof_carreras.nombre]',
		'nombre_corto'   => 'required',
	];
	public $carreras_errors = [
		'facultad' => [
			'required'   => 'Por favor, seleccione una Facultad.',
		],
		'nombre_carrera' => [
			'required'  => 'Por favor, ingrese el nombre de la Carrera.',
			'is_unique' => 'Lo sentimos, el nombre de carrera ya existe en la base de datos. Intente nuevamente.',
		]
		,
		'nombre_corto' => [
			'required'  => 'Por favor, ingrese el Nombre Corto de la Carrera.',
		]
	];

	public $carrerasEditar =[
		'facultad_editar'       => 'required',
		'nombre_carrera_editar' => 'required',
		'nombre_corto_editar'   => 'required',
	];
	public $carrerasEditar_errors = [
		'facultad_editar' => [
			'required'   => 'Por favor, seleccione una Facultad.',
		],
		'nombre_carrera_editar' => [
			'required'  => 'Por favor, ingrese el nombre de la Carrera.',
		]
		,
		'nombre_corto_editar' => [
			'required'  => 'Por favor, ingrese el Nombre Corto de la Carrera.',
		]
	];
	public $materia =[
		'nombre'       => 'required|is_unique[cof_materias.nombre]',
		'codMateria' => 'required|is_unique[cof_materias.codMateria]',
		'nombreCorto'   => 'required|is_unique[cof_materias.nombreCorto]',
	];
	public $materia_errors = [
		'nombre' => [
			'required'   => 'Por favor, ingrese el nombre de la materia.',
			'is_unique'   => 'El nombre de la materia ya existe.',
		],
		'codMateria' => [
			'required'  => 'Por favor, ingrese el código de la materia.',
			'is_unique'   => 'El código de la materia ya existe.',
		]
		,
		'nombreCorto' => [
			'required'  => 'Por favor, ingrese el Nombre Corto de la materia.',
			'is_unique'   => 'El nombre corto de la materia ya existe.',
		]
	];
	public $materia_editar =[
		'nombre_editar'       => 'required',
		'codMateria_editar' => 'required',
		'nombreCorto_editar'   => 'required',
	];
	public $materia_editar_errors = [
		'nombre_editar' => [
			'required'   => 'Por favor, ingrese el nombre de la materia.',
		],
		'codMateria_editar' => [
			'required'  => 'Por favor, ingrese el código de la materia.',
		]
		,
		'nombreCorto_editar' => [
			'required'  => 'Por favor, ingrese el Nombre Corto de la materia.',
		]
	];

	public $cargaAcademica =[
		'personaId'=> 'required',
	];

	public $planMateria =[
		'planId'    => 'required',
		'materiaId' => 'required',
	];
	public $planMateria_errors = [
		'planId' => [
			'required'   => 'Por favor, seleccione un Plan.',
		],
		'materiaId' => [
			'required'  => 'Por favor, seleccione una Materia.',
		]
	];
// VALIDACIONES PARA CATALGOS EVALUACION 
	public $temaCapacitacion =[
		'tema'       => 'required|is_unique[eva_temas_capacitacion.tema]',
	];
	public $temaCapacitacion_errors = [
		'tema' => [
			'required'  => 'Por favor, ingrese el Nombre del tema de capacitación.',
			'is_unique'   => 'El nombre del tema de capacitación  ya existe.',
		],
		
	];
	public $temaCapacitacion_editar =[
		'tema_editar'       => 'required',
	];
	public $temaCapacitacion_editar_errors = [
		'tema_editar' => [
			'required'  => 'Por favor, ingrese el Nombre del tema de capacitación.',
		],
		
	];

	public $temaCapacitacion_editar1 =[
		'tema_editar'       => 'required|is_unique[eva_temas_capacitacion.tema]',
	];
	public $temaCapacitacion_editar1_errors = [
		'tema_editar' => [
			'is_unique'  => 'Lo sentimos, Este tema de capacitación ya existe',
		],
		
	];


	public $pregunta =[
		'pregunta'       => 'required|is_unique[eva_preguntas.pregunta]',
	];
	public $pregunta_errors = [
		'pregunta' => [
			'required'  => 'Por favor, ingrese la pregunta.',
			'is_unique'  => 'Lo sentimos, Esta pregunta ya existe',
		],
		
	];

	public $pregunta_editar =[
		'pregunta_editar'       => 'required',
	];
	public $pregunta_editar_errors = [
		'pregunta_editar' => [
			'required'  => 'Por favor, ingrese la pregunta.',
		],
		
	];

	public $pregunta_editar1 =[
		'pregunta_editar'       => 'required|is_unique[eva_preguntas.pregunta]',
	];
	public $pregunta_editar1_errors = [
		'pregunta_editar' => [
			'is_unique'  => 'Lo sentimos, Esta pregunta ya existe',
		],
		
	];
	public $area =[
		'area'       => 'required|is_unique[eva_areas_evaluacion.areaEvaluacion]',
	];
	public $area_errors = [
		'area' => [
			'required'  => 'Por favor, ingrese el area de evaluación.',
			'is_unique'  => 'Lo sentimos, Esta area de evaluación ya existe',
		],
	];
	public $area_editar =[
		'area_editar'       => 'required',
	];
	public $area_editar_errors = [
		'area_editar' => [
			'required'  => 'Por favor, ingrese el area de evaluación.',
		],
		
	];
	public $area_editar1 =[
		'area_editar'       => 'required|is_unique[eva_areas_evaluacion.areaEvaluacion]',
	];
	public $area_editar1_errors = [
		'area_editar' => [
			'is_unique'  => 'Lo sentimos, Esta area de evaluación ya existe',
		],
		
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
