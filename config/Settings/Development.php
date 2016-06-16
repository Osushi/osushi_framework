<?php

namespace Settings;

class Development
{
  const PHP_DISPLAY_ERRORS = 'On';

  const APP_MODE = 'Development';
  const APP_DEBUG = true;
  const APP_IS_LOG = true;
  const APP_LOG_LEVEL = \Slim\Log::DEBUG;

  public static function get_db_settings($is_master = false)
  {
    if ($is_master) {
      return [
        'DB_HOST' => $_ENV['DB_MASTER_HOST'],
        'DB_NAME' => $_ENV['DB_MASTER_NAME'],
        'DB_USER' => $_ENV['DB_MASTER_USER'],
        'DB_PASS' => $_ENV['DB_MASTER_PASS'],
      ];
    }

    return [
      'DB_HOST' => $_ENV['DB_SLAVE_HOST'],
      'DB_NAME' => $_ENV['DB_SLAVE_NAME'],
      'DB_USER' => $_ENV['DB_SLAVE_USER'],
      'DB_PASS' => $_ENV['DB_SLAVE_PASS'],
    ];
  }
}
