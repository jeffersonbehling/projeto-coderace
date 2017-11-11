<?php
use Migrations\AbstractMigration;

class CreateEvents extends AbstractMigration
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
        $table = $this->table('events');
        $table->addColumn('id', 'uuid', [
            'default' => null,
            'null' => false
        ]);

        $table->addColumn('name', 'string', [
            'default' => null,
            'length' => 255,
            'null' => false
        ]);

        $table->addColumn('time_inicial', 'time', [
            'default' => null,
            'null' => false
        ]);

        $table->addColumn('location', 'string', [
            'default' => null,
            'length' => 255,
            'null' => false
        ]);

        $table->addColumn('description', 'text', [
            'default' => null,
            'null' => true
        ]);

        $table->addColumn('created', 'timestamp', [
            'default' => null,
            'null' => false
        ]);

        $table->addPrimaryKey('id');
        $table->create();
    }
}
