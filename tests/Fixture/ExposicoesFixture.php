<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ExposicoesFixture
 */
class ExposicoesFixture extends TestFixture
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
                'loja_id' => 1,
                'nome' => 'Lorem ipsum dolor sit amet',
                'endereco' => 'Lorem ipsum dolor sit amet',
                'cidade' => 'Lorem ipsum dolor sit amet',
                'estado' => 'Lorem ipsum dolor sit amet',
                'cep' => 'Lorem ipsum dolor ',
                'telefone' => 'Lorem ipsum dolor ',
                'created_at' => 1751518687,
                'updated_at' => '2025-07-03 04:58:07',
            ],
        ];
        parent::init();
    }
}
