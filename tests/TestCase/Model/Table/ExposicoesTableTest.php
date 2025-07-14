<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ExposicoesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ExposicoesTable Test Case
 */
class ExposicoesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ExposicoesTable
     */
    protected $Exposicoes;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Exposicoes',
        'app.Lojas',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Exposicoes') ? [] : ['className' => ExposicoesTable::class];
        $this->Exposicoes = $this->getTableLocator()->get('Exposicoes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Exposicoes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ExposicoesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ExposicoesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
