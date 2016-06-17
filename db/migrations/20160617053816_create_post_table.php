<?php

use Phinx\Migration\AbstractMigration;

class CreatePostTable extends AbstractMigration
{
  /**
   * Change Method.
   *
   * Write your reversible migrations using this method.
   *
   * More information on writing migrations is available here:
   * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
   *
   * The following commands can be used in this method and Phinx will
   * automatically reverse them when rolling back:
   *
   *    createTable
   *    renameTable
   *    addColumn
   *    renameColumn
   *    addIndex
   *    addForeignKey
   *
   * Remember to call "create()" or "update()" and NOT "save()" when working
   * with the Table class.
   */
  public function change()
  {
    $posts = $this->table('posts', ['id' => 'post_id']);
    $posts->addColumn('message', 'string')
      ->addColumn('updated_at', 'datetime')
      ->addColumn('created_at', 'datetime')
      ->create();
  }
}
