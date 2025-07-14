<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SessionsLogin Entity
 *
 * @property int $id
 * @property string $ip_address
 * @property int $user_id
 * @property \Cake\I18n\FrozenTime $login_time
 * @property \Cake\I18n\FrozenTime|null $created_at
 * @property \Cake\I18n\FrozenTime|null $updated_at
 *
 * @property \App\Model\Entity\User $user
 */
class SessionsLogin extends Entity
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
        'ip_address' => true,
        'user_id' => true,
        'login_time' => true,
        'created_at' => true,
        'updated_at' => true,
        'user' => true,
    ];
}
