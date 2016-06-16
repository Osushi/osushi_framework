<?php

namespace Services;

class Render
{
  public static function render($app, $path, $attach = null)
  {
    if (is_null($attach)) {
      $app->render("{$path}.twig");
    } else {
      $app->render("{$path}.twig", $attach);
    }
  }

  public static function to_json($app, $object)
  {
    $app->response->headers->set('Content-Type', 'application/json');
    echo json_encode($object);
  }
}
