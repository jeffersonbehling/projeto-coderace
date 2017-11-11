<?php
use Migrations\AbstractSeed;

/**
 * Likes seed.
 */
class LikesSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => '1',
                'name' => 'Pizza',
            ],
            [
                'id' => '2',
                'name' => 'X-Tudo',
            ],
            [
                'id' => '3',
                'name' => 'Batatas Fritas',
            ],
            [
                'id' => '4',
                'name' => 'Cerveja',
            ],
            [
                'id' => '5',
                'name' => 'Chopp',
            ],
            [
                'id' => '6',
                'name' => 'Vinho Tinto',
            ],
            [
                'id' => '7',
                'name' => 'Rock',
            ],
            [
                'id' => '8',
                'name' => 'Funk',
            ],
            [
                'id' => '9',
                'name' => 'Filmes Terror',
            ],
            [
                'id' => '10',
                'name' => 'Séries de Ação',
            ]
        ];

        $table = $this->table('likes');
        $table->insert($data)->save();

    }
}
