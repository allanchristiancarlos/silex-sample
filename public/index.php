<?php

require_once __DIR__ . '/../vendor/autoload.php';



/**
 * Application
 */
$app = new Silex\Application();
$app['debug'] = true;


$app->register(new Silex\Provider\DoctrineServiceProvider(), [
	'db.options' => [
		
	]
]);



$app->get('/api/v1/users', 'App\\Controllers\\UserController::getAll');
$app->get('/api/v1/users/{id}', 'App\\Controllers\\UserController::get');

$app->run();