<?php
require '../vendor/autoload.php';

//Create instance of a Slim app
$app = new \Slim\Slim();

//Define routes
$app->get('/hello/:name', function ($name) {
    echo "Hello, $name";
});

//Run the application
$app->run();