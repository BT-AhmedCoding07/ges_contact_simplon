<?php

use Router\Router;
use App\Exceptions\NotFoundException;

require '../vendor/autoload.php';

define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);
define('SCRIPTS', dirname($_SERVER['SCRIPT_NAME']) . DIRECTORY_SEPARATOR);
define('DB_NAME', 'my_contact');
define('DB_HOST', '127.0.0.1');
define('DB_USER', 'root');
define('DB_PWD', '');

$router = new Router($_GET['url']);

//Home-page -- article --- categorie
//Je remplaces posts par contacts
$router->get('/', 'App\Controllers\ContactController@welcome');
$router->get('/contacts', 'App\Controllers\ContactController@index');
$router->get('/contacts/:id', 'App\Controllers\ContactController@show');
 //je remplace tag par type
$router->get('/types/:id', 'App\Controllers\ContactController@type'); //je remplace tag par type

// $router->get('/login', 'App\Controllers\UserController@login');
// $router->post('/login', 'App\Controllers\UserController@loginPost');
// $router->get('/logout', 'App\Controllers\UserController@logout');

$router->get('/admin/contacts', 'App\Controllers\Admin\ContactController@index');
$router->get('/admin/contacts/create', 'App\Controllers\Admin\ContactController@create');
$router->post('/admin/contacts/create', 'App\Controllers\Admin\ContactControllerr@createContact');
$router->post('/admin/contacts/delete/:id', 'App\Controllers\Admin\ContactController@destroy');
$router->get('/admin/contacts/edit/:id', 'App\Controllers\Admin\ContactController@edit');
$router->post('/admin/contacts/edit/:id', 'App\Controllers\Admin\ContactController@update');

try {
    $router->run();
} catch (NotFoundException $e) {
    return $e->error404();
}
