<?php

$router = $di->getRouter();

// Define your routes here
$router->addGet(
	'/',
	'Preinscription::index'
);

$router->handle($_SERVER['REQUEST_URI']);
