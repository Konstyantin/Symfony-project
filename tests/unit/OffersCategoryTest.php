<?php

/**
 * Class OffersCategoryTest
 */
class OffersCategoryTest extends \Codeception\Test\Unit
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
     * Test get category list
     */
    public function testGetCategoryList()
    {
        $em = $this->getModule('Doctrine2')->em;

        $categoryList = $em->getRepository('AppBundle:OffersCategory')->getCategoryList();

        $this->assertNotNull($categoryList);

        $this->assertNotEmpty($categoryList);

        $this->assertCount(2, $categoryList);
    }

    /**
     * Test get Item by name
     */
    public function testGetItemByName()
    {
        $em = $this->getModule('Doctrine2')->em;

        $category = $em->getRepository('AppBundle:OffersCategory')->getItemByName('Winner finance');

        $this->assertNotNull($category);

        $this->assertNotEmpty($category);

        $this->assertNull($category->getParent());

        $this->assertEquals('winner-finance' ,$category->getSlug());
    }

    /**
     * Test get category by slug
     */
    public function testGetCategoryBySlug()
    {
        $em = $this->getModule('Doctrine2')->em;

        $category = $em->getRepository('AppBundle:OffersCategory')->getCategoryBySlug('winner-finance');

        $this->assertNotNull($category);

        $this->assertNotEmpty($category);

        $this->assertEquals('Winner finance', $category->getName());
    }
}