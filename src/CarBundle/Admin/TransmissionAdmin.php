<?php
/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 23.10.17
 * Time: 23:12
 */

namespace CarBundle\Admin;

use CarBundle\Entity\Transmission;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

/**
 * Class TransmissionAdmin
 * @package CarBundle\Admin
 */
class TransmissionAdmin extends AbstractAdmin
{
    /**
     * @var string $translationDomain
     */
    protected $translationDomain = 'SonataTransmissionBundle';

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
                'required' => false,
                'translation_domain' => 'SonataTransmissionBundle',
                'attr' => [
                    'placeholder' => 'form.placeholder.name'
                ]
            ])
            ->add('steps', NumberType::class, [
                'label' => 'form.label.steps',
                'required' => false,
                'translation_domain' => 'SonataTransmissionBundle',
                'attr' => [
                    'placeholder' => 'form.placeholder.steps'
                ]
            ])
            ->add('price', NumberType::class, [
                'label' => 'form.label.price',
                'required' => false,
                'translation_domain' => 'SonataTransmissionBundle',
                'attr' => [
                    'placeholder' => 'form.placeholder.price'
                ]
            ])
            ->add('type', EntityType::class, [
                'class' => 'CarBundle:TransmissionType',
                'choice_label' => 'title',
                'multiple' => false,
                'required' => false,
            ]);
    }

    /**
     * Configure datagrid filters
     *
     * Configure datagrid filters which will used for filtered and sort
     * the list of transmission
     *
     * @param DatagridMapper $filter
     */
    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter
            ->add('id', null, ['label' => 'datagrid.filters.id'])
            ->add('name', null, ['label' => 'datagrid.filters.name'])
            ->add('steps', null, ['label' => 'datagrid.filters.steps'])
            ->add('price', null, ['label' => 'datagrid.filters.price'])
            ->add('type', null, ['label' => 'datagrid.filters.type']);
    }

    /**
     * Configure list fields
     *
     * Specific fields which are show all transmission are listed
     *
     * @param ListMapper $list
     */
    protected function configureListFields(ListMapper $list)
    {
        $list
            ->addIdentifier('id', null, ['label' => 'datagrid.list.id', 'row_align' => 'left'])
            ->addIdentifier('name', null, ['label' => 'datagrid.list.name'])
            ->addIdentifier('steps', null, ['label' => 'datagrid.list.steps', 'row_align' => 'left'])
            ->addIdentifier('price', null, ['label' => 'datagrid.list.price', 'row_align' => 'left'])
            ->addIdentifier('type', null, ['label' => 'datagrid.list.type']);
    }

    /**
     * This receives the object to transform to a string as the first parameter
     *
     * @param mixed $object
     * @return string
     */
    public function toString($object)
    {
        if($object instanceof Transmission){
            return $object->getName();
        }
        return 'Transmission'; // shown in the breadcrumb on the create view
    }
}