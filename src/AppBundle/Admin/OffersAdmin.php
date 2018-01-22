<?php

/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 18.10.17
 * Time: 22:45
 */
namespace AppBundle\Admin;

use AppBundle\Entity\Category;
use AppBundle\Entity\Offers;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;

/**
 * Class OffersAdmin
 * @package AppBundle\Admin
 */
class OffersAdmin extends AbstractAdmin
{
    /**
     * @var string $translationDomain
     */
    protected $translationDomain = 'SonataCategoryBundle';

    /**
     * Configure form field
     *
     * Set configuration for form field which are displayed on the edit
     * and create action
     *
     * @param FormMapper $form
     */
    protected function configureFormFields(FormMapper $form)
    {
        $form
            ->add('title', TextType::class, [
                'label' => 'Title',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Title'
                ]
            ])
            ->add('shortDescription', 'textarea', [
                'label' => 'Short Description',
                'required' => false,
                'attr' => [
                    'class' => 'tinymce',
                    'data-theme' => 'bbcode',
                    'tinymce'=>'{"theme":"simple"}'// Skip it if you want to use default theme
                ]
            ])
            ->add('description', 'textarea', [
                'label' => 'Description',
                'required' => false,
                'attr' => [
                    'class' => 'tinymce',
                    'data-theme' => 'bbcode',
                    'tinymce'=>'{"theme":"simple"}'// Skip it if you want to use default theme
                ]
            ]);
    }

    /**
     * Configure datagrid filters
     *
     * Configure datagrid filters which will used for filtered and sort
     * the list of model
     *
     * @param DatagridMapper $filter
     */
    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter->add('title', null, ['label' => 'Title']);
    }

    /**
     * Configure list fields
     *
     * Specific fields which are show all model are listed
     *
     * @param ListMapper $list
     */
    protected function configureListFields(ListMapper $list)
    {
        $list
            ->addIdentifier('title', null, [
                'label' => 'Title'
            ])
            ->add('_action', null, [
                'actions' => [
                    'delete' => [],
                    'edit' => []
                ]
            ]);
    }

    /**
     * This receives the object to transform to a string as the first parameter
     *
     * @param mixed $object
     * @return string
     */
    public function toString($object)
    {
        if ($object instanceof Offers) {
            return $object->getTitle();
        }

        return 'Category';
    }
}