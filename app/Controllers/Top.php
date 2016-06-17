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
    $data = [
      'header' => $this->get_header(),
      'meta' => $this->get_meta(),
    ];
    \Services\Render::render($this->_app, 'top/index', $data);
  }
}
