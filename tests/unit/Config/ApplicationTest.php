<?php

namespace Config;

class ApplicationTest extends \Codeception\Test\Unit
{
  /**
   * @var \UnitTester
   */
  protected $tester;

  protected function _before()
  {
    $this->app = \Application::get_instance();
  }

  // tests
  public function testValidLaunch()
  {
    $this->assertEquals(get_class($this->app), 'Slim\Slim');
  }
}
