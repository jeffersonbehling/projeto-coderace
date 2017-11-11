<?php
use Migrations\AbstractMigration;

class CreatePhotos extends AbstractMigration
{
    public $autoId = false;

    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('photos');
        $table->addColumn('id', 'uuid', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('directory', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('events_id', 'uuid', [
            'default' => null,
            'null' => false,
        ]);
        $table->addPrimaryKey("id");
        $table->create();
    }
}
