<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CombustiveisFixture
 */
class CombustiveisFixture extends TestFixture
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
                'created_at' => 1751514534,
                'updated_at' => '2025-07-03 03:48:54',
            ],
        ];
        parent::init();
    }
}
