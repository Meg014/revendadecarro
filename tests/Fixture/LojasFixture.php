<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LojasFixture
 */
class LojasFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'nome' => 'Lorem ipsum dolor sit amet',
                'user_id' => 1,
                'created_at' => 1751518888,
                'updated_at' => '2025-07-03 05:01:28',
            ],
        ];
        parent::init();
    }
}
