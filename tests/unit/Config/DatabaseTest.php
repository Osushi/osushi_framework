<?php

namespace Config;

class DatabaseTest extends \Codeception\Test\Unit
{
  /**
   * @var \UnitTester
   */
  protected $tester;

  protected function _before()
  {
    $this->master = \Database::get_master();
    $this->slave = \Database::get_slave();
  }

  // tests
  public function testValidMaster()
  {
    $this->assertEquals(get_class($this->master), 'Illuminate\Database\Capsule\Manager');
  }

  public function testValidSlave()
  {
    $this->assertEquals(get_class($this->slave), 'Illuminate\Database\Capsule\Manager');
  }
}
