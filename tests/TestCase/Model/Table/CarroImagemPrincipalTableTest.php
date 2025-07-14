<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CarroImagemPrincipalTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CarroImagemPrincipalTable Test Case
 */
class CarroImagemPrincipalTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CarroImagemPrincipalTable
     */
    protected $CarroImagemPrincipal;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.CarroImagemPrincipal',
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
        $config = $this->getTableLocator()->exists('CarroImagemPrincipal') ? [] : ['className' => CarroImagemPrincipalTable::class];
        $this->CarroImagemPrincipal = $this->getTableLocator()->get('CarroImagemPrincipal', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->CarroImagemPrincipal);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CarroImagemPrincipalTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\CarroImagemPrincipalTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
