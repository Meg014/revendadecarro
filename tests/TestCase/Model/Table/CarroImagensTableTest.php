<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CarroImagensTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CarroImagensTable Test Case
 */
class CarroImagensTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CarroImagensTable
     */
    protected $CarroImagens;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.CarroImagens',
        'app.Carros',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('CarroImagens') ? [] : ['className' => CarroImagensTable::class];
        $this->CarroImagens = $this->getTableLocator()->get('CarroImagens', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->CarroImagens);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CarroImagensTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\CarroImagensTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
