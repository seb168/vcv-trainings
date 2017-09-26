<?php
require '../app/Autoloader.php';
App\Autoloader::register();

$app = App\Config::getInstance();

$app->title = 'Mon Super Site';

$exampleRepository = $app->getRepository('Example');
