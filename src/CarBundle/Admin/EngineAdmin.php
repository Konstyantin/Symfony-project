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
use Symfony\Component\Form\Extension\Core\Type\TextType;

/**
 * Class EngineAdmin
 * @package CarBundle\Admin
 */
class EngineAdmin extends AbstractAdmin
{
    /**
     * @var string $translationDomain
     */
    protected $translationDomain = 'SonataEngineBundle';

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
            ->add('model_name', TextType::class, [
                'label' => 'form.label.engine_model',
                'translation_domain' => 'SonataEngineBundle',
                'required' => false,
                'attr' => [
                    'placeholder' => 'form.placeholder.engine_model'
                ]
            ])
            ->add('num_cylinders', NumberType::class, [
                'label' => 'form.label.number_cylinders',
                'translation_domain' => 'SonataEngineBundle',
                'required' => false,
                'attr' => [
                    'placeholder' => 'form.placeholder.number_cylinders'
                ]
            ])
            ->add('engine_volume', NumberType::class, [
                'label' => 'form.label.engine_volume',
                'translation_domain' => 'SonataEngineBundle',
                'required' => false,
                'attr' => [
                    'placeholder' => 'form.placeholder.engine_volume'
                ]
            ])
            ->add('car_drive', 'choice', [
                'label' => 'form.label.car_drive',
                'translation_domain' => 'SonataEngineBundle',
                'required' => false,
                'choices' => [
                    'Font' => 'front',
                    'Back' => 'back',
                    'Full' => 'full'
                ]
            ])
            ->add('power', NumberType::class, [
                'label' => 'form.label.power',
                'translation_domain' => 'SonataEngineBundle',
                'required' => false,
                'attr' => [
                    'placeholder' => 'form.placeholder.power'
                ]
            ])
            ->add('r_hv', NumberType::class, [
                'label' => 'form.label.r_hv',
                'translation_domain' => 'SonataEngineBundle',
                'required' => false,
                'attr' => [
                    'placeholder' => 'form.placeholder.r_hv'
                ]
            ])
            ->add('max_torque', NumberType::class, [
                'label' => 'form.label.max_torque',
                'translation_domain' => 'SonataEngineBundle',
                'required' => false,
                'attr' => [
                    'placeholder' => 'form.placeholder.max_torque'
                ]
            ])
            ->add('compression', NumberType::class, [
                'label' => 'form.label.compression',
                'translation_domain' => 'SonataEngineBundle',
                'required' => false,
                'attr' => [
                    'placeholder' => 'form.placeholder.compression'
                ]
            ])
        ;
    }

    /**
     * Configure datagrid filters
     *
     * Configure datagrid filters which will used for filtered and sort
     * the list of engine
     *
     * @param DatagridMapper $filter
     */
    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter
            ->add('model_name', null, ['label' => 'datagrid.filters.engine_model'])
            ->add('num_cylinders', null, ['label' => 'datagrid.filters.number_cylinders'])
            ->add('engine_volume', null, ['label' => 'datagrid.filters.engine_volume'])
            ->add('car_drive', null, ['label' => 'datagrid.filters.car_drive'])
            ->add('power', null, ['label' => 'datagrid.filters.power'])
            ->add('max_torque', null, ['label' => 'datagrid.filters.max_torque'])
            ->add('compression', null, ['label' => 'datagrid.filters.compression']);
    }

    /**
     * Configure list fields
     *
     * Specific fields which are show all engine are listed
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
            ->addIdentifier('model_name', null, [
                'label' => 'datagrid.list.engine_model',
                'row_align' => 'left'
            ])
            ->addIdentifier('num_cylinders', null, [
                'label' => 'datagrid.list.number_cylinders',
                'row_align' => 'left'
            ])
            ->addIdentifier('engine_volume', null, [
                'label' => 'datagrid.list.engine_volume',
                'row_align' => 'left'
            ])
            ->addIdentifier('power', null, [
                'label' => 'datagrid.list.power',
                'row_align' => 'left'
            ])
            ->addIdentifier('max_torque', null, [
                'label' => 'datagrid.list.max_torque',
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
            return $object->getModelName();
        }

        return 'Engine';
    }
}