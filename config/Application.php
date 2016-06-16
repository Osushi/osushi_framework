<?php

class Application
{
  private static $_instance = null;

  public static function get_instance()
  {
    if (is_null(self::$_instance)) {
      self::$_instance = new \Slim\Slim(self::get_setting());
      self::$_instance->add(new \Slim\Extras\Middleware\CsrfGuard());
      self::$_instance->response->headers->set('Vary', 'User-Agent');
      self::$_instance->response->headers->set('Content-type', 'text/html; charset=utf-8');
      if ($_ENV['APP_ENV'] === 'Development') {
        self::$_instance->view->parserOptions = [
          'debug' => true,
        ];
        self::$_instance->view->parserExtensions = [
          new \Slim\Views\TwigExtension(),
          new \Twig_Extension_Debug(),
        ];
      }
    }

    return self::$_instance;
  }

  private static function get_setting()
  {
    $env_class = '\Settings\\'.$_ENV['APP_ENV'];
    $common_class = '\Settings\\Common';

    return [
      'mode' => $env_class::APP_MODE,
      'templates.path' => $common_class::APP_TEMPLATE_PATH,
      'debug' => $env_class::APP_DEBUG,
      'view' => new \Slim\Views\Twig(),
      'log.enabled' => $env_class::APP_IS_LOG,
      'log.level' => $env_class::APP_LOG_LEVEL,
      'log.writer' => new \Slim\Extras\Log\DateTimeFileWriter([
        'path' => $common_class::APP_LOG_PATH,
        'name_format' => 'Y-m-d',
        'message_format' => "%label%\t%date%\t%message%",
      ]),
      'cookies.encrypt' => \Settings\Common::APP_COOKIE_ENCRYPT,
      'cookies.secret_key' => \Settings\Common::APP_COOKIE_SECRET,
      'cookies.cipher' => MCRYPT_RIJNDAEL_256,
      'cookies.cipher_mode' => MCRYPT_MODE_CBC,
    ];
  }
}
