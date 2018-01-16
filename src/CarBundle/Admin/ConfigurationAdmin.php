<?php
/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 13.01.18
 * Time: 14:55
 */

namespace CarBundle\Admin;

use CarBundle\Entity\Configuration;
use CarBundle\Entity\Dynamics;
use CarBundle\Form\BodyType;
use CarBundle\Form\DynamicsType;
use CarBundle\Form\FuelType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

/**
 * Class ConfigurationAdmin
 * @package CarBundle\Admin
 */
class ConfigurationAdmin extends AbstractAdmin
{
    /**
     * Configure form field
     *
     * Define form fields and set configuration and attibutes for fields
     *
     * @param FormMapper $form
     */
    protected function configureFormFields(FormMapper $form)
    {
        $form
            ->tab('Configuration')
                ->with('Configuration')
                    ->add('carName', TextType::class, [
                        'label' => 'Car name',
                        'required' => false,
                        'attr' => [
                            'placeholder' => 'Car name'
                        ]
                    ])
                    ->add('engine', 'sonata_type_model', [
                        'class' => 'CarBundle:Engine',
                        'multiple' => false
                    ])
                    ->add('transmission', 'sonata_type_model', [
                        'class' => 'CarBundle:Transmission',
                        'multiple' => false
                    ])
                    ->add('price', NumberType::class, [
                        'label' => 'Price',
                        'required' => false,
                        'attr' => [
                            'placeholder' => 'Price'
                        ]
                    ])
                ->end()
            ->end()
            ->tab('Body')
                ->with('Body')
                    ->add('body', BodyType::class, [
                        'label' => false,
                    ])
                ->end()
            ->end()
            ->tab('Fuel')
                ->with('Fuel')
                    ->add('fuel', FuelType::class, [
                        'label' => false,
                    ])
                ->end()
            ->end()
            ->tab('Dynamics')
                ->with('Dynamics')
                    ->add('dynamics', DynamicsType::class, [
                        'label' => false,
                    ])
                ->end()
            ->end()
        ;
    }

    /**
     * Configure datagrid filters
     *
     * Define entity field which will be used for filtration
     *
     * @param DatagridMapper $filter
     */
    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter->add('carName', null, ['label' => 'Car name']);
    }

    /**
     * Configure list fields
     *
     * Define entity field which will be show on dashboard
     *
     * @param ListMapper $list
     */
    protected function configureListFields(ListMapper $list)
    {
        $list
            ->addIdentifier('carName', null, ['label' => 'Car name'])
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
        if ($object instanceof Configuration) {
            return $object->getCarName();
        }
    }
}