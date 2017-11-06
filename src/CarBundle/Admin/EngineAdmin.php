<?php

/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 19.10.17
 * Time: 23:06
 */
namespace CarBundle\Admin;

use CarBundle\Entity\Engine;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

/**
 * Class ModelAdmin
 * @package CarBundle\Admin
 */
class EngineAdmin extends AbstractAdmin
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
            ->add('num_cylinders', NumberType::class, [
                'label' => 'Number cylinders',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Number Cylinders'
                ]
            ])
            ->add('engine_volume', NumberType::class, [
                'label' => 'Engine volume',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Engine Volume'
                ]
            ])
            ->add('car_drive', 'choice', [
                'label' => 'Car drive',
                'required' => false,
                'choices' => [
                    'Font' => 'front',
                    'Back' => 'back',
                    'Full' => 'full'
                ]
            ])
            ->add('power', NumberType::class, [
                'label' => 'Power',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Power'
                ]
            ])
            ->add('r_hv', NumberType::class, [
                'label' => 'R/Hv',
                'required' => false,
                'attr' => [
                    'placeholder' => 'R/Hv'
                ]
            ])
            ->add('max_torque', NumberType::class, [
                'label' => 'Max torque',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Max torque'
                ]
            ])
            ->add('compression', NumberType::class, [
                'label' => 'Compression',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Compression'
                ]
            ])
        ;
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
        $filter
            ->add('num_cylinders', null, ['label' => 'Num ylinders'])
            ->add('engine_volume', null, ['label' => 'Engine volume'])
            ->add('car_drive', null, ['label' => 'Car Drive'])
            ->add('power', null, ['label' => 'power'])
            ->add('max_torque', null, ['label' => 'Max torque'])
            ->add('compression', null, ['label' => 'Compression']);
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
            ->addIdentifier('num_cylinders', null, [
                'label' => 'Num ylinders',
                'row_align' => 'left'
            ])
            ->addIdentifier('engine_volume', null, [
                'label' => 'Engine volume',
                'row_align' => 'left'
            ])
            ->addIdentifier('power', null, [
                'label' => 'Power',
                'row_align' => 'left'
            ])
            ->addIdentifier('max_torque', null, [
                'label' => 'Max torque',
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
        if ($object instanceof Engine) {
            return $object->getId();
        }

        return 'Engine';
    }
}