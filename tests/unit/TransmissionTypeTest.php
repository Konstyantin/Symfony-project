<?php

/**
 * Class TransmissionTypeTest
 */
class TransmissionTypeTest extends \Codeception\Test\Unit
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
     * Test get item by title
     */
    public function testGetItemByTitle()
    {
        $em = $this->getModule('Doctrine2')->em;

        $transmissionTypeItem = $em->getRepository('CarBundle:TransmissionType')->getFirstTransmissionType();

        $transmissionTypeTitle = $transmissionTypeItem->getTitle();

        $failTransmissionTypeTitle = $transmissionTypeTitle . 'fail';

        $transmissionType = $em->getRepository('CarBundle:TransmissionType')->getItemByTitle($transmissionTypeTitle);

        $this->assertNotEmpty($transmissionType);

        $this->assertNotNull($transmissionType);

        $this->assertEquals($transmissionType->getTitle(), $transmissionTypeTitle);

        $this->assertNotEquals($transmissionType->getTitle(), $failTransmissionTypeTitle);
    }

    /**
     * Test get first transmission type
     */
    public function testGetFirstTransmissionType()
    {
        $em = $this->getModule('Doctrine2')->em;

        $transmissionType = $em->getRepository('CarBundle:TransmissionType')->getFirstTransmissionType();

        $this->assertNotNull($transmissionType);

        $this->assertNotEmpty($transmissionType);
    }
}