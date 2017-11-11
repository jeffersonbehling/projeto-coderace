<?php
use Migrations\AbstractMigration;

class AddImageEvents extends AbstractMigration
{
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
        $table->addColumn('image', 'string', [
            'default' => null,
            'length' => 255,
            'null' => true
        ]);

        $table->update();
    }
}
