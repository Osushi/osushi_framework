<?php

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

trait Database
{
  private static $_m = null;
  private static $_s = null;

  public static function get_master()
  {
    if (is_null(self::$_m)) {
      self::$_m = new Capsule();
      $class = '\Settings\\'.$_ENV['APP_ENV'];
      $e = $class::get_db_settings(true);
      self::$_m->addConnection([
        'driver' => 'mysql',
        'host' => $e['DB_HOST'],
        'database' => $e['DB_NAME'],
        'username' => $e['DB_USER'],
        'password' => $e['DB_PASS'],
        'charset' => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix' => '',
      ]);
      self::$_m->setEventDispatcher(new Dispatcher(new Container()));
      self::$_m->setAsGlobal();
      self::$_m->bootEloquent();
      if ($_ENV['APP_ENV'] === 'Development') {
        self::$_m->getDatabaseManager()->enableQueryLog();
      }
    }

    if (is_null(self::$_m->getDatabaseManager()->getPdo())) {
      self::$_m->getDatabaseManager()->reconnect();
    }

    return self::$_m;
  }

  public static function get_slave()
  {
    if (is_null(self::$_s)) {
      self::$_s = new Capsule();
      $class = '\Settings\\'.$_ENV['APP_ENV'];
      $e = $class::get_db_settings();
      self::$_s->addConnection([
        'driver' => 'mysql',
        'host' => $e['DB_HOST'],
        'database' => $e['DB_NAME'],
        'username' => $e['DB_USER'],
        'password' => $e['DB_PASS'],
        'charset' => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix' => '',
      ]);
      self::$_s->setEventDispatcher(new Dispatcher(new Container()));
      self::$_s->setAsGlobal();
      self::$_s->bootEloquent();
      if ($_ENV['APP_ENV'] === 'Development') {
        self::$_s->getDatabaseManager()->enableQueryLog();
      }
    }

    if (is_null(self::$_s->getDatabaseManager()->getPdo())) {
      self::$_s->getDatabaseManager()->reconnect();
    }

    return self::$_s;
  }
}
