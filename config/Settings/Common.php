<?php

namespace Settings;

class Common
{
  const APP_COOKIE_ENCRYPT = true;
  const APP_COOKIE_SECRET = 'secretsecret';
  const APP_TEMPLATE_PATH = BASE_PATH.'/app/Views';
  const APP_LOG_PATH = BASE_PATH.'/log/app';

  public static function init()
  {
    define('BASE_PATH', str_replace('/config/Settings', '', __DIR__));
    if (mb_strlen($_ENV['SERVICE_PORT']) > 0) {
      define('SERVICE_URL', $_ENV['SERVICE_SCHEME'].'://'.$_ENV['SERVICE_DOMAIN'].':'.$_ENV['SERVICE_PORT']);
    } else {
      define('SERVICE_URL', $_ENV['SERVICE_SCHEME'].'://'.$_ENV['SERVICE_DOMAIN']);
    }
  }
}
