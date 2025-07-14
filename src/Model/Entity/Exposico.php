<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Exposico Entity
 *
 * @property int $id
 * @property int $loja_id
 * @property string $nome
 * @property string $endereco
 * @property string $cidade
 * @property string $estado
 * @property string $cep
 * @property string|null $telefone
 * @property \Cake\I18n\FrozenTime $created_at
 * @property \Cake\I18n\FrozenTime|null $updated_at
 *
 * @property \App\Model\Entity\Loja $loja
 */
class Exposico extends Entity
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
        'loja_id' => true,
        'nome' => true,
        'endereco' => true,
        'cidade' => true,
        'estado' => true,
        'cep' => true,
        'telefone' => true,
        'created_at' => true,
        'updated_at' => true,
        'loja' => true,
    ];
}
