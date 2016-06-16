<?php

$app->get('/?', function () {
  $top = new \Controllers\Top();
  $top->action_show();
});

$app->notFound(function () use ($app) {
  \Services\Render::render($app, 'exception/404');
});

$app->error(function () use ($app) {
  \Services\Render::render($app, 'exception/500');
});
