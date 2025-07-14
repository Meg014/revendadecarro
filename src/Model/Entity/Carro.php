<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Carro Entity
 *
 * @property int $id
 * @property int $exposicao_id
 * @property int|null $user_id
 * @property int $marca_id
 * @property int $modelo_id
 * @property int $combustivel_id
 * @property int $transmissao_id
 * @property int $condicao_id
 * @property int $categoria_id
 * @property string $nome
 * @property string $ano
 * @property int|null $quilometragem
 * @property string|null $cor_exterior
 * @property string|null $cor_interior
 * @property int|null $portas
 * @property string|null $motor
 * @property string|null $torque
 * @property string|null $potencia
 * @property string|null $velocidade_maxima
 * @property string|null $tracao
 * @property string|null $capacidade_reboque
 * @property string $placa
 * @property string $codigo_estoque
 * @property string $preco
 * @property string|null $preco_promocional
 * @property string|null $descricao
 * @property string|null $extras
 * @property string|null $observacoes
 * @property bool $status
 * @property bool|null $destaque
 * @property int|null $visualizacoes
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Exposico $exposico
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Marca $marca
 * @property \App\Model\Entity\Modelo $modelo
 * @property \App\Model\Entity\Combustivei $combustivei
 * @property \App\Model\Entity\Transmisso $transmisso
 * @property \App\Model\Entity\Condico $condico
 * @property \App\Model\Entity\Categoria $categoria
 * @property \App\Model\Entity\Feature[] $features
 */
class Carro extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'exposicao_id' => true,
        'user_id' => true,
        'marca_id' => true,
        'modelo_id' => true,
        'combustivel_id' => true,
        'transmissao_id' => true,
        'condicao_id' => true,
        'categoria_id' => true,
        'nome' => true,
        'ano' => true,
        'quilometragem' => true,
        'cor_exterior' => true,
        'cor_interior' => true,
        'portas' => true,
        'motor' => true,
        'torque' => true,
        'potencia' => true,
        'velocidade_maxima' => true,
        'tracao' => true,
        'capacidade_reboque' => true,
        'placa' => true,
        'codigo_estoque' => true,
        'preco' => true,
        'preco_promocional' => true,
        'descricao' => true,
        'extras' => true,
        'observacoes' => true,
        'status' => true,
        'destaque' => true,
        'visualizacoes' => true,
        'created' => true,
        'modified' => true,
        'exposico' => true,
        'user' => true,
        'marca' => true,
        'modelo' => true,
        'combustivei' => true,
        'transmisso' => true,
        'condico' => true,
        'categoria' => true,
        'features' => true,
    ];
}
