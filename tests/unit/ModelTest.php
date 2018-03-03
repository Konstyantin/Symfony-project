<?php

/**
 * Class ModelTest
 */
class ModelTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    /**
     * Test get model list
     */
    public function testGetModelsList()
    {
        $em = $this->getModule('Doctrine2')->em;

        $model = $em->getRepository('CarBundle:Model')->getModelsList();

        $this->assertNotEmpty($model);

        $this->assertNotNull($model);

        $this->assertGreaterThan(1, count($model));
    }

    /**
     * Test get model by user id
     */
    public function testGetModelsByUserId()
    {
        $em = $this->getModule('Doctrine2')->em;

        $model = $em->getRepository('CarBundle:Model')->getModelsByUserId();

        $this->assertNotEmpty($model);
    }

    /**
     * Test get model by name
     */
    public function testGetModelByName()
    {
        $em = $this->getModule('Doctrine2')->em;

        $modelItem = $em->getRepository('CarBundle:Model')->getFirstModel();

        $modelItemName = $modelItem->getName();

        $falseModelItemName = $modelItemName . 'fail';

        $model = $em->getRepository('CarBundle:Model')->getModelByName($modelItemName);

        $this->assertNotEmpty($modelItemName);

        $this->assertNotNull($model);

        $this->assertEquals($model->getName(), $modelItemName);

        $this->assertNotEquals($model->getName(), $falseModelItemName);
    }

    /**
     * Test get first model
     */
    public function testGetFirstModel()
    {
        $em = $this->getModule('Doctrine2')->em;

        $model = $em->getRepository('CarBundle:Model')->getFirstModel();

        $this->assertNotNull($model);

        $this->assertNotEmpty($model);

        $this->assertNotEmpty($model->getName());
    }
}