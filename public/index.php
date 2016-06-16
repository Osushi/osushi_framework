<?php

require_once str_replace('/public', '', __DIR__).'/vendor/autoload.php';
\Boot::init();

$app = \Application::get_instance();
$routes = (array) glob(BASE_PATH.'/config/Routes/*.php');
foreach ($routes as $route) {
  require $route;
}
$app->run();
