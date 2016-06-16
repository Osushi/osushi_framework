<?php

namespace Values;

trait Meta
{
  private function get_meta()
  {
    $unixtime = 1462528582; // Redefine cache time for assets

    $m = [
      'unixtime' => $unixtime,
      'service_url' => SERVICE_URL,
    ];

    return $m;
  }
}
