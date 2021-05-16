<?php namespace Config;


// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Client\Home');
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
$routes->get('/', 'Client/Home::index');

$routes->post('get_all', 'Client\Home::getAll');

$routes->group('login', function ($routes){
	$routes->group('users', function ($routes){
		$routes->get('/', 'Login\Users::index');
		$routes->post('login', 'Login\Users::login');
		
	});

	$routes->group('newUsers', function ($routes){
		$routes->get('/', 'Login\NewUsers::index');
		$routes->post('save', 'Login\NewUsers::nouveau');
	});
});

	/*$routes->group('home', function ($routes){
		$routes->get('/', 'Client\Home::index');
		$routes->post('get_all', 'Client\Home::getAll');
		
	});*/

	$routes->group('activite', function ($routes){
		$routes->get('/', 'Client\Activite::index');
		$routes->post('get', 'Client\Activite::getAll');
		
	});

	$routes->group('actualite', function ($routes){
		$routes->get('/', 'Client\Actualite::index');
		$routes->post('get', 'Client\Actualite::getAll');
		
	});

	$routes->group('forum', function ($routes){
		$routes->get('/', 'Client\Forum::index');
		$routes->post('get', 'Client\Forum::getAll');
		
	});

	$routes->group('contact', function ($routes){
		$routes->get('/', 'Client\Contact::index');
		
	});

	$routes->group('apropos', function ($routes){
		$routes->get('/', 'Client\Apropos::index');
		$routes->post('get_apropos', 'Client\Apropos::getAll');
		
	});
	$routes->group('partenaire', function ($routes){
		$routes->get('/', 'Client\Partenaire::index');
		$routes->post('get', 'Client\Partenaire::afficherPartenaire');
		
	});


	$routes->group('site', function ($routes){
		$routes->get('/', 'Client\Site::index');
		$routes->post('get_site', 'Client\Site::getAll');
		
	});

	$routes->group('don', function ($routes){
		$routes->get('/', 'Client\Don::index');
		$routes->post('save', 'Client\Don::save');
		
	});


$routes->group('admin', function ($routes){
	$routes->group('activite', function ($routes){
		$routes->get('/', 'Admin\Activite::index');
		$routes->post('save', 'Admin\Activite::nouveau');
		$routes->get('liste', 'Admin\Activite::lister');
		$routes->post('delete', 'Admin\Activite::supprimer');
		$routes->post('getOne', 'Admin\Activite::getOne');
		
		
	});
	$routes->group('partenaire', function ($routes){
		$routes->get('/', 'Admin\Partenaire::index');
		$routes->post('save', 'Admin\Partenaire::ajouterPartenaire');
		$routes->get('liste', 'Admin\Partenaire::lister');
		$routes->post('delete', 'Admin\Partenaire::supprimer');
		$routes->post('getOne', 'Admin\Partenaire::getOne');
		
	});
	$routes->group('forum', function ($routes){
		$routes->get('/', 'Admin\Forum::index');
		$routes->post('save', 'Admin\Forum::ajouterForum');
		$routes->get('liste', 'Admin\Forum::lister');
		$routes->post('delete', 'Admin\Forum::supprimer');
		$routes->post('getOne', 'Admin\Forum::getOne');
		
		
	});

	$routes->group('apropos', function ($routes){
		$routes->get('/', 'Admin\Apropos::index');
		$routes->post('save', 'Admin\Apropos::ajouter');
		$routes->get('liste', 'Admin\Apropos::lister');
		$routes->post('delete', 'Admin\Apropos::supprimer');
		$routes->post('getOne', 'Admin\Apropos::getOne');
		
		
	});

	$routes->group('accueil', function ($routes){
		$routes->get('/', 'Admin\Accueil::index');
		$routes->post('save', 'Admin\Accueil::ajouter');
		$routes->get('liste', 'Admin\Accueil::lister');
		$routes->post('delete', 'Admin\Accueil::supprimer');
		$routes->post('getOne', 'Admin\Accueil::getOne');
		
		
	});

	$routes->group('site', function ($routes){
		$routes->get('/', 'Admin\Site::index');
		$routes->post('save', 'Admin\Site::ajouter');
		$routes->get('liste', 'Admin\Site::lister');
		$routes->post('delete', 'Admin\Site::supprimer');
		$routes->post('getOne', 'Admin\Site::getOne');
		
		
	});
	

	$routes->group('actualite', function ($routes){
		$routes->get('/', 'Admin\Actualite::index');
		$routes->post('save', 'Admin\Actualite::nouveau');
		$routes->post('get', 'Admin\Actualite::getActivite');
		$routes->get('liste', 'Admin\Actualite::lister');
		$routes->post('delete', 'Admin\Actualite::supprimer');
		$routes->post('getOne', 'Admin\Actualite::getOne');
		
		
	});

	$routes->group('don', function ($routes){
		$routes->get('/', 'Admin\Don::index');
		$routes->get('liste', 'Admin\Don::lister');
		
	});
});

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
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
