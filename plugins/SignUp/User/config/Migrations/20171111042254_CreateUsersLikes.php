<?php
use Migrations\AbstractMigration;

class CreateUsersLikes extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public $autoId = false;
    public function change()
    {
        $table = $this->table('users_likes');
        $table->addColumn('id', 'uuid', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('user_id', 'uuid', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('like_id', 'uuid', [
            'default' => null,
            'null' => false,
        ]);
        $table->addPrimaryKey("id");
        $table->create();
    }
}
