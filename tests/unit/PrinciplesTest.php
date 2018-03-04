<?php


class PrinciplesTest extends \Codeception\Test\Unit
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
     * Test get list
     */
    public function testGetList()
    {
        $em = $this->getModule('Doctrine2')->em;

        $principles = $em->getRepository('AppBundle:Principles')->getList();

        $this->assertNotEmpty($principles);
        $this->assertNotNull($principles);

        $this->assertGreaterThanOrEqual(2, count($principles));
    }

    /**
     * Test get First item
     */
    public function testGetFirstItem()
    {
        $em = $this->getModule('Doctrine2')->em;

        $principles = $em->getRepository('AppBundle:Principles')->getFirstItem();

        $this->assertNotEmpty($principles);
        $this->assertNotEmpty($principles);

        $this->assertNotEmpty($principles->getTitle());
    }

    /**
     * Test get item by slug
     */
    public function testGetItemBySlug()
    {
        $em = $this->getModule('Doctrine2')->em;

        $principlesItem = $em->getRepository('AppBundle:Principles')->getFirstItem();

        $principles = $em->getRepository('AppBundle:Principles')->getItemBySlug($principlesItem->getSlug());

        $this->assertNotEmpty($principles);
        $this->assertNotEmpty($principles);

        $this->assertEquals($principlesItem->getSlug(), $principles->getSlug());
    }
}