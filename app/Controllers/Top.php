<?php

namespace Controllers;

class Top extends \Controllers\Base
{
  use \Values\Meta;
  use \Values\Top;

  public function __construct()
  {
    $this->_app = \Application::get_instance();
  }

  public function action_show()
  {
    $capsule = \Database::get_slave();
    $post = new \Models\Post();
    $res = $post->orderBy('post_id', 'DESC')->get();
    $capsule->getDatabaseManager()->disconnect();

    $data = [
      'header' => $this->get_header(),
      'data' => $res->toArray(),
      'meta' => $this->get_meta(),
    ];
    \Services\Render::render($this->_app, 'top/index', $data);
  }

  public function action_post()
  {
    $v = new \Validators\Top();
    if (!$v->create_validate()) {
      $this->_app->flash('errors', $v->get_results());
      $this->_app->flash('params', $this->_app->request->params());
      $this->_app->redirect('/');
    }
    $params = $v->get_results();

    $capsule = \Database::get_master();
    $post = new \Models\Post();
    try {
      $capsule->getDatabaseManager()->beginTransaction();

      $post->message = \Utils\Base::mb_trim($params['message']);
      $post->save();

      $capsule->getDatabaseManager()->commit();
    } catch (\Exception $e) {
      $capsule->getDatabaseManager()->rollback();

      $this->_app->flash('errors', ['message' => ['Failed to insert DB']]);
      $this->_app->flash('params', $this->_app->request->params());
      $this->_app->redirect('/');
    }
    $capsule->getDatabaseManager()->disconnect();

    $this->_app->flash('success', ['message' => ['The message was posted']]);
    $this->_app->redirect('/');
  }

  public function action_delete()
  {
    $v = new \Validators\Top();
    if (!$v->delete_validate()) {
      $this->_app->flash('errors', $v->get_results());
      $this->_app->flash('params', $this->_app->request->params());
      $this->_app->redirect('/');
    }
    $params = $v->get_results();

    $capsule = \Database::get_master();
    $post = new \Models\Post();
    $post = $post->where('post_id', '=', $params['post_id'])->first();
    try {
      $capsule->getDatabaseManager()->beginTransaction();

      $post->delete();

      $capsule->getDatabaseManager()->commit();
    } catch (\Exception $e) {
      $capsule->getDatabaseManager()->rollback();

      $this->_app->flash('errors', ['message' => ['Failed to delete DB']]);
      $this->_app->flash('params', $this->_app->request->params());
      $this->_app->redirect('/');
    }
    $capsule->getDatabaseManager()->disconnect();

    $this->_app->flash('success', ['message' => ['The message was deleted']]);
    $this->_app->redirect('/');
  }
}
