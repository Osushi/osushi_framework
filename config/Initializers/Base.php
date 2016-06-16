<?php

namespace Initializers;

class Base
{
  public static function init()
  {
    date_default_timezone_set('Asia/Tokyo');
    mb_internal_encoding('UTF-8');
    mb_regex_encoding('UTF-8');
    error_reporting(E_ALL | E_STRICT);
    $class = '\Settings\\'.$_ENV['APP_ENV'];
    ini_set('display_errors', $class::PHP_DISPLAY_ERRORS);
    ini_set('log_errors', 'On');
    ini_set('error_log', BASE_PATH.'/log/app/Inner_Error.log');
    ini_set('session.save_handler', $_ENV['SESSION_HANDLER']);
    ini_set('session.save_path', $_ENV['SESSION_PATH']);
    if ($_ENV['SESSION_HANDLER'] == 'files') {
      ini_set('session.save_path', BASE_PATH.'/'.$_ENV['SESSION_PATH']);
    }
  }
}
