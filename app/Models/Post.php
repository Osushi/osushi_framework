<?php

namespace Models;

class Post extends \Illuminate\Database\Eloquent\Model
{
  protected $table = 'posts';
  protected $primaryKey = 'post_id';
  protected $guarded = [
    'post_id',
  ];
}
