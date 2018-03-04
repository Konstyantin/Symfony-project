<?php

/**
 * Class NewsTest
 */
class NewsTest extends \Codeception\Test\Unit
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
     * Test get list query
     */
    public function testGetListQuery()
    {
        $em = $this->getModule('Doctrine2')->em;

        $newsQuery = $em->getRepository('AppBundle:News')->getListQuery();

        $this->assertNotNull($newsQuery);

        $this->assertNotEmpty($newsQuery);
    }

    /**
     * Test get First item
     */
    public function testGetFirstItem()
    {
        $em = $this->getModule('Doctrine2')->em;

        $news = $em->getRepository('AppBundle:News')->getFirstItem();

        $this->assertNotEmpty($news);
        $this->assertNotEmpty($news);

        $this->assertNotEmpty($news->getTitle());
    }

    /**
     * Test get Item by slug
     */
    public function testGetItemBySlug()
    {
        $em = $this->getModule('Doctrine2')->em;

        $newsItem = $em->getRepository('AppBundle:News')->getFirstItem();

        $news = $em->getRepository('AppBundle:News')->getItemBySlug($newsItem->getSlug());

        $this->assertNotEmpty($news);
        $this->assertNotEmpty($news);

        $this->assertEquals($newsItem->getSlug(), $news->getSlug());
    }
}