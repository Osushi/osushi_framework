<?php

$app->get('/?', function () {
  $top = new \Controllers\Top();
  $top->action_show();
});

$app->post('/?', function () {
  $top = new \Controllers\Top();
  $top->action_post();
});

$app->delete('/?', function () {
  $top = new \Controllers\Top();
  $top->action_delete();
});

$app->notFound(function () use ($app) {
  \Services\Render::render($app, 'exception/404');
});

$app->error(function () use ($app) {
  \Services\Render::render($app, 'exception/500');
});
