<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TransmissoesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TransmissoesTable Test Case
 */
class TransmissoesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TransmissoesTable
     */
    protected $Transmissoes;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Transmissoes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Transmissoes') ? [] : ['className' => TransmissoesTable::class];
        $this->Transmissoes = $this->getTableLocator()->get('Transmissoes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Transmissoes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TransmissoesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
