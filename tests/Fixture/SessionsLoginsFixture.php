<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SessionsLoginsFixture
 */
class SessionsLoginsFixture extends TestFixture
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
                'ip_address' => 'Lorem ipsum dolor sit amet',
                'user_id' => 1,
                'login_time' => '2025-06-24 19:07:37',
                'created_at' => 1750792057,
                'updated_at' => '2025-06-24 19:07:37',
            ],
        ];
        parent::init();
    }
}
