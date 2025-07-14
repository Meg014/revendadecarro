<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CombustiveisTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CombustiveisTable Test Case
 */
class CombustiveisTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CombustiveisTable
     */
    protected $Combustiveis;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Combustiveis',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Combustiveis') ? [] : ['className' => CombustiveisTable::class];
        $this->Combustiveis = $this->getTableLocator()->get('Combustiveis', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Combustiveis);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CombustiveisTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
