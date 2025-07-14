<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CarrosFixture
 */
class CarrosFixture extends TestFixture
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
                'exposicao_id' => 1,
                'user_id' => 1,
                'marca_id' => 1,
                'modelo_id' => 1,
                'combustivel_id' => 1,
                'transmissao_id' => 1,
                'condicao_id' => 1,
                'categoria_id' => 1,
                'nome' => 'Lorem ipsum dolor sit amet',
                'ano' => 'Lorem ipsum dolor sit amet',
                'quilometragem' => 1,
                'cor_exterior' => 'Lorem ipsum dolor sit amet',
                'cor_interior' => 'Lorem ipsum dolor sit amet',
                'portas' => 1,
                'motor' => 'Lorem ipsum dolor sit amet',
                'torque' => 'Lorem ipsum dolor sit amet',
                'potencia' => 'Lorem ipsum dolor sit amet',
                'velocidade_maxima' => 'Lorem ipsum dolor sit amet',
                'tracao' => 'Lorem ipsum dolor sit amet',
                'capacidade_reboque' => 'Lorem ipsum dolor sit amet',
                'placa' => 'Lorem ipsum dolor sit amet',
                'codigo_estoque' => 'Lorem ipsum dolor sit amet',
                'preco' => 1.5,
                'preco_promocional' => 1.5,
                'descricao' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'extras' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'observacoes' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'status' => 1,
                'destaque' => 1,
                'visualizacoes' => 1,
                'created' => '2025-07-09 01:33:16',
                'modified' => '2025-07-09 01:33:16',
            ],
        ];
        parent::init();
    }
}
