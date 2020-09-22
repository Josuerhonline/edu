<?php namespace Config;

/**
 * --------------------------------------------------------------------
 * URI Routing
 * --------------------------------------------------------------------
 * This file lets you re-map URI requests to specific controller functions.
 *
 * Typically there is a one-to-one relationship between a URL string
 * and its corresponding controller class/method. The segments in a
 * URL normally follow this pattern:
 *
 *    example.com/class/method/id
 *
 * In some instances, however, you may want to remap this relationship
 * so that a different class/function is called than the one
 * corresponding to the URL.
 */

// Create a new instance of our RouteCollection class.
$routes = Services::routes(true);

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 * The RouteCollection object allows you to modify the way that the
 * Router works, by acting as a holder for it's configuration settings.
 * The following methods can be called on the object to modify
 * the default operations.
 *
 *    $routes->defaultNamespace()
 *
 * Modifies the namespace that is added to a controller if it doesn't
 * already have one. By default this is the global namespace (\).
 *
 *    $routes->defaultController()
 *
 * Changes the name of the class used as a controller when the route
 * points to a folder instead of a class.
 *
 *    $routes->defaultMethod()
 *
 * Assigns the method inside the controller that is ran when the
 * Router is unable to determine the appropriate method to run.
 *
 *    $routes->setAutoRoute()
 *
 * Determines whether the Router will attempt to match URIs to
 * Controllers when no specific route has been defined. If false,
 * only routes that have been defined here will be available.
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.


$routes->get('/', 'Home::index');

$routes->group('dashboard', function($routes)
{
});

$routes->resource('principal',['except' => ['show']]);
$routes->resource('Catalogos/Usuario',['except' => ['show']]);
$routes->resource('Catalogos/personas',['except' => ['show']]);
$routes->resource('Catalogos/universidad',['except' => ['show']]);
$routes->resource('Catalogos/facultad',['except' => ['show']]);
$routes->resource('Catalogos/carreras',['except' => ['show']]);
$routes->resource('Catalogos/Ciclo',['except' => ['show']]);
$routes->resource('Catalogos/Materias',['except' => ['show']]);
$routes->resource('Catalogos/CargaAdemic',['except' => ['show']]);
$routes->resource('Catalogos/Ponderaciones',['except' => ['show']]);
$routes->resource('Menu/Menu',['except' => ['show']]);
$routes->resource('Menu/MenuDetalle',['except' => ['show']]);
$routes->resource('CatalogosEvaluacion/TemasCapacitacion',['except' => ['show']]);
$routes->resource('CatalogosEvaluacion/Preguntas',['except' => ['show']]);
$routes->resource('CatalogosEvaluacion/AreasEvaluacion',['except' => ['show']]);
$routes->resource('CatalogosEvaluacion/Instrumento',['except' => ['show']]);
$routes->resource('CatalogosEvaluacion/Inscripcion',['except' => ['show']]);
$routes->resource('EvaluacionDocente/EvaluacionDocente',['except' => ['show']]);
$routes->resource('Graficos/Graficos',['except' => ['show']]);
$routes->resource('Graficos/SeleccionGrafico',['except' => ['show']]);
$routes->resource('Graficos/Docente',['except' => ['show']]);
$routes->resource('Graficos/SeleccionDocente',['except' => ['show']]);
$routes->resource('CambioClave',['except' => ['show']]);
$routes->resource('Reportes/Reportes',['except' => ['show']]);
$routes->resource('Bitacora/Bitacora',['except' => ['show']]);
$routes->resource('Ayuda/ManualUsuario',['except' => ['show']]);
$routes->resource('Ayuda/ManualAdministrador',['except' => ['show']]);
$routes->resource('Ayuda/ManualDesarrollador',['except' => ['show']]);




$routes->get('login', 'web/User::login');
$routes->post('/login_post', 'web/User::login_post');
$routes->post('activar_usuario', 'web/User::activar_usuario',['as' => 'activar_usuario']);
$routes->post('recuperar_clave', 'web/User::recuperar_clave',['as' => 'recuperar_clave']);
$routes->get('/logout', 'web/User::logout');


/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
