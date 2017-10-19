<?php

/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 18.10.17
 * Time: 22:45
 */
namespace AppBundle\Admin;

use AppBundle\Entity\Category;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

/**
 * Class CategoryAdmin
 * @package AppBundle\Admin
 */
class CategoryAdmin extends AbstractAdmin
{
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
            ->add('parent', EntityType::class, [
                'class' => 'AppBundle:Category',
                'choice_label' => 'name',
                'multiple' => false,
                'required' => false,
            ])
            ->add('name', TextType::class, [
                'label' => 'Name'
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
        $filter->add('name', null, ['label' => 'Name']);
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
            ->addIdentifier('id', null, [
                'label' => 'Id',
                'row_align' => 'left'
            ])
            ->addIdentifier('name', null, [
                'label' => 'name'
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
        if ($object instanceof Category) {
            return $object->getName();
        }

        return 'Category';
    }
}