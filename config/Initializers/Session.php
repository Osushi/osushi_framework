<?php

namespace Initializers;

class Session
{
  public static function init()
  {
    session_cache_limiter(false);
    session_start();
  }
}
