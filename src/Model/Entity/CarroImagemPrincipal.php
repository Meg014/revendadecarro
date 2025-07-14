<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CarroImagemPrincipal Entity
 *
 * @property int $id
 * @property int $carro_id
 * @property string $caminho
 * @property \Cake\I18n\FrozenTime|null $created
 *
 * @property \App\Model\Entity\Carro $carro
 */
class CarroImagemPrincipal extends Entity
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
        'carro_id' => true,
        'caminho' => true,
        'created' => true,
        'carro' => true,
    ];
}
