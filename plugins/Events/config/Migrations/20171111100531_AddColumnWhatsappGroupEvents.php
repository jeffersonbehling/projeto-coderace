<?php
use Migrations\AbstractMigration;

class AddColumnWhatsappGroupEvents extends AbstractMigration
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
        $table->addColumn('whatsapp_group', 'string', [
            'default' => null,
            'length' => 255,
            'null' => true
        ]);

        $table->update();
    }
}
