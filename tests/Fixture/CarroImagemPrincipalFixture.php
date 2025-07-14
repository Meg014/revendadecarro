<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CarroImagemPrincipalFixture
 */
class CarroImagemPrincipalFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'carro_imagem_principal';
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
                'caminho' => 'Lorem ipsum dolor sit amet',
                'created' => '2025-07-09 06:11:42',
            ],
        ];
        parent::init();
    }
}
