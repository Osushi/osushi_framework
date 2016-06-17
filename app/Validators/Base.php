<?php

namespace Validators;

class Base
{
  public $_params;
  public $_errors = [];

  public function get_results()
  {
    if (count($this->_errors) > 0) {
      return ['message' => $this->_errors, 'params' => $this->_params];
    }

    return $this->_params;
  }

  public function get_params()
  {
    return $this->_params;
  }

  public function set_params($params)
  {
    $this->_params = $params;
  }
}
