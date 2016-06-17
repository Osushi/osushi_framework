<?php

class RoboFile extends \Robo\Tasks
{
  public function init()
  {
    $this->_exec('find log/ -type d -exec chmod 777 {} \;');
    $this->_exec('find tmp/ -type d -exec chmod 777 {} \;');
  }
}
