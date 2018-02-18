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
use Symfony\Component\Validator\Constraints\NotBlank;

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
            ->add('name', TextType::class, [
                'label' => 'form.label.name',
                'translation_domain' => 'SonataEngineBundle',
                'required' => false,
                'attr' => [
                    'placeholder' => 'form.placeholder.name'
                ],
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('numCylinders', NumberType::class, [
                'label' => 'form.label.number_cylinders',
                'translation_domain' => 'SonataEngineBundle',
                'required' => false,
                'attr' => [
                    'placeholder' => 'form.placeholder.number_cylinders'
                ],
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('engineVolume', NumberType::class, [
                'label' => 'form.label.engine_volume',
                'translation_domain' => 'SonataEngineBundle',
                'required' => false,
                'attr' => [
                    'placeholder' => 'form.placeholder.engine_volume'
                ],
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('power', NumberType::class, [
                'label' => 'form.label.power',
                'translation_domain' => 'SonataEngineBundle',
                'required' => false,
                'attr' => [
                    'placeholder' => 'form.placeholder.power'
                ],
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('rHv', NumberType::class, [
                'label' => 'form.label.r_hv',
                'translation_domain' => 'SonataEngineBundle',
                'required' => false,
                'attr' => [
                    'placeholder' => 'form.placeholder.r_hv'
                ],
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('maxTorque', NumberType::class, [
                'label' => 'form.label.max_torque',
                'translation_domain' => 'SonataEngineBundle',
                'required' => false,
                'attr' => [
                    'placeholder' => 'form.placeholder.max_torque'
                ],
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('compression', NumberType::class, [
                'label' => 'form.label.compression',
                'translation_domain' => 'SonataEngineBundle',
                'required' => false,
                'attr' => [
                    'placeholder' => 'form.placeholder.compression'
                ],
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('price', NumberType::class, [
                'label' => 'form.label.price',
                'translation_domain' => 'SonataEngineBundle',
                'required' => false,
                'attr' => [
                    'placeholder' => 'form.placeholder.price'
                ],
                'constraints' => [
                    new NotBlank()
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
            ->add('name', null, ['label' => 'datagrid.filters.name'])
            ->add('numCylinders', null, ['label' => 'datagrid.filters.number_cylinders'])
            ->add('engineVolume', null, ['label' => 'datagrid.filters.engine_volume'])
            ->add('power', null, ['label' => 'datagrid.filters.power'])
            ->add('maxTorque', null, ['label' => 'datagrid.filters.max_torque'])
            ->add('compression', null, ['label' => 'datagrid.filters.compression'])
            ->add('price', null, ['label' => 'datagrid.filters.price']);
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
            ->addIdentifier('name', null, [
                'label' => 'datagrid.list.name',
                'row_align' => 'left'
            ])
            ->addIdentifier('numCylinders', null, [
                'label' => 'datagrid.list.number_cylinders',
                'row_align' => 'left'
            ])
            ->addIdentifier('engineVolume', null, [
                'label' => 'datagrid.list.engine_volume',
                'row_align' => 'left'
            ])
            ->addIdentifier('power', null, [
                'label' => 'datagrid.list.power',
                'row_align' => 'left'
            ])
            ->addIdentifier('maxTorque', null, [
                'label' => 'datagrid.list.max_torque',
                'row_align' => 'left'
            ])
            ->add('price', null, [
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
        if ($object instanceof Engine) {
            return $object->getName();
        }

        return 'Engine';
    }
}