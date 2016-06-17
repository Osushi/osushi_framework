<?php

namespace Values;

trait Top
{
  private function get_header()
  {
    $h['signal'] = 'top';
    $h['title'] = 'トップページ';

    return $h;
  }
}
