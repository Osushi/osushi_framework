<?php

namespace Initializers;

class Env
{
  private static $_instance = null;

  public static function get_instance()
  {
    if (is_null(self::$_instance)) {
      self::$_instance = new \Dotenv\Dotenv(str_replace('/config/Initializers', '', __DIR__));
    }

    return self::$_instance;
  }
}
