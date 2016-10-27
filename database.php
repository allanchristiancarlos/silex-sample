<?php

require_once 'vendor/autoload.php';

/**
 * Database 
 */
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
$isDevMode = true;
$annotationsConfiguration = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/../entities"), $isDevMode);
$connectionConfiguration = [
	'driver' => 'pdo_mysql',
	'dbname' => 'silex_api',
	'host' => 'localhost',
	'user' => 'root',
	'password' => '',
	'port' => 3306
];
$entityManager = EntityManager::create($connectionConfiguration, $annotationsConfiguration);