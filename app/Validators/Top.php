<?php

namespace Validators;

use Respect\Validation\Validator as v;

class Top extends \Validators\Base
{
  public function create_validate()
  {
    $this->_params = \Application::get_instance()->request->params();

    $validator = v::key('message', v::stringType()->notEmpty()->length(1, 140));

    try {
      $validator->assert($this->_params);
    } catch (\InvalidArgumentException $e) {
      $this->_errors = $e->findMessages([
        'message' => '',
      ]);

      return false;
    }

    return true;
  }

  public function delete_validate()
  {
    $this->_params = \Application::get_instance()->request->params();

    $validator = v::key('post_id', v::stringType()->notEmpty()->noWhitespace()->regex('/^[0-9]+$/'));

    try {
      $validator->assert($this->_params);
    } catch (\InvalidArgumentException $e) {
      $this->_errors = $e->findMessages([
        'post_id' => '',
      ]);

      return false;
    }

    return true;
  }
}
