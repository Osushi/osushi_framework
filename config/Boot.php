<?php

class Boot
{
  public static function init($is_define = true, $is_env = true, $is_setting = true, $is_session = true)
  {
    // Set env
    if ($is_env) {
      $env = \Initializers\Env::get_instance();
      $env->load();
    }

    // Set define value
    if ($is_define) {
      \Settings\Common::init();
    }

    // Set base settings
    if ($is_setting) {
      \Initializers\Base::init();
    }

    // Set session
    if ($is_session) {
      \Initializers\Session::init();
    }
  }
}
