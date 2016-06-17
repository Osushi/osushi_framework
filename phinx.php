<?php

require_once __DIR__.'/vendor/autoload.php';

$env = new \Dotenv\Dotenv(__DIR__);
$env->load();

return [
  'paths' => [
    'migrations' => 'db/migrations',
    'seeds' => 'db/seeds',
  ],
  'environments' => [
    'default_migration_table' => 'phinxlog',
    'default_database' => $_ENV['APP_ENV'],
    $_ENV['APP_ENV'] => [
      'adapter' => 'mysql',
      'host' => $_ENV['DB_MASTER_HOST'],
      'name' => $_ENV['DB_MASTER_NAME'],
      'user' => $_ENV['DB_MASTER_USER'],
      'pass' => $_ENV['DB_MASTER_PASS'],
      'port' => 3306,
    ],
  ],
];
