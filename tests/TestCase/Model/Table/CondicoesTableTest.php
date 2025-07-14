<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CondicoesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CondicoesTable Test Case
 */
class CondicoesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CondicoesTable
     */
    protected $Condicoes;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Condicoes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Condicoes') ? [] : ['className' => CondicoesTable::class];
        $this->Condicoes = $this->getTableLocator()->get('Condicoes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Condicoes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CondicoesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
