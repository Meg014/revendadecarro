<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CarroImagensFixture
 */
class CarroImagensFixture extends TestFixture
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
                'carro_id' => 1,
                'titulo' => 'Lorem ipsum dolor sit amet',
                'caminho' => 'Lorem ipsum dolor sit amet',
                'created' => '2025-07-09 05:32:31',
            ],
        ];
        parent::init();
    }
}
