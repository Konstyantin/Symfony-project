<?php

/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 19.10.17
 * Time: 23:06
 */
namespace CarBundle\Admin;

use CarBundle\Entity\Car;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

/**
 * Class ModelAdmin
 * @package CarBundle\Admin
 */
class CarAdmin extends AbstractAdmin
{
    /**
     * @var string $translationDomain
     */
    protected $translationDomain = 'SonataCarBundle';

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
            ->add('name', TextType::class, [
                'label' => 'form.label.name',
                'translation_domain' => 'SonataCarBundle',
                'required' => false,
                'attr' => [
                    'placeholder' => 'form.placeholder.name'
                ]
            ])
            ->add('price', TextType::class, [
                'label' => 'form.label.price',
                'translation_domain' => 'SonataCarBundle',
                'required' => false,
                'attr' => [
                    'placeholder' => 'form.label.price'
                ]
            ])
            ->add('model', EntityType::class, [
                'class' => 'CarBundle:Model',
                'choice_label' => 'name',
                'multiple' => false,
                'required' => false,
            ])
            ->add('model', 'sonata_type_model', [
                'class' => 'CarBundle:Model',
            ]);
        ;
    }

    /**
     * Configure datagrid filters
     *
     * Configure datagrid filters which will used for filtered and sort
     * the list of car
     *
     * @param DatagridMapper $filter
     */
    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter
            ->add('name', null, ['label' => 'datagrid.filters.name'])
            ->add('price', null, ['label' => 'Price']);
    }

    /**
     * Configure list fields
     *
     * Specific fields which are show all car are listed
     *
     * @param ListMapper $list
     */
    protected function configureListFields(ListMapper $list)
    {
        $list
            ->addIdentifier('id', null, [
                'label' => 'datagrid.list.id',
                'row_align' => 'left'
            ])
            ->addIdentifier('name', null, [
                'label' => 'datagrid.list.name'
            ])
            ->addIdentifier('price', null, [
                'label' => 'datagrid.list.price',
                'row_align' => 'left'
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
        if ($object instanceof Car) {
            return $object->getName();
        }

        return 'Car';
    }
}