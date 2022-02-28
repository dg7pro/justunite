<?php

/**
 * Front controller
 *
 * PHP version 7.0
 */

/**
 * Composer
 */
require dirname(__DIR__) . '/vendor/autoload.php';

/**
 * Load env variables
 */
$dotenv = Dotenv\Dotenv::createImmutable('../');
$dotenv->load();

/**
 * Error and Exception handling
 */
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');

/**
 * Set default timezone to India
 */
date_default_timezone_set('Asia/Kolkata');


session_start();
/*if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}*/
$csrf = new App\Csrf();
$csrf_token = $csrf->getValue();
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = $csrf_token;
}

/**
 * Routing
 */
$router = new Core\Router();

// Add the routes
$router->add('', ['controller' => 'Home', 'action' => 'index']);

$router->add('register', ['controller' =>'Register','action'=>'index']);
$router->add('login', ['controller' =>'Login','action'=>'index']);
$router->add('dashboard', ['controller' =>'Account','action'=>'dashboard']);
$router->add('settings', ['controller' =>'Account','action'=>'settings']);
$router->add('admin', ['controller' =>'Admin','action'=>'index']);
$router->add('logout', ['controller' =>'Account','action'=>'logout']);

$router->add('donate', ['controller' =>'Home','action'=>'donate']);
$router->add('members', ['controller' =>'Members','action'=>'index']);
$router->add('problems', ['controller' =>'Problems','action'=>'index']);
$router->add('parties', ['controller' =>'Parties','action'=>'index']);

$router->add('blog', ['controller' =>'Blog','action'=>'index']);
$router->add('blog/{slug:[a-z]+(?:-[a-z]+)*}', ['controller' => 'Blog', 'action' => 'slug']);

$router->add('{controller}/{action}');

$router->add('password/reset/{token:[\da-f]+}', ['controller' => 'Password', 'action' => 'reset']);
$router->add('register/activate/{token:[\da-f]+}', ['controller' => 'Register', 'action' => 'activate']);

$router->dispatch($_SERVER['QUERY_STRING']);

// Match the requested route
/*$url = $_SERVER['QUERY_STRING'];

if ($router->match($url)) {
    echo '<pre>';
    var_dump($router->getParams());
    echo '</pre>';
} else {
    echo "No route found for URL '$url'";
}

// Display the routing table
echo '<pre>';
//var_dump($router->getRoutes());
echo htmlspecialchars(print_r($router->getRoutes(), true));
echo '</pre>';*/



