<?php
/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 21.01.18
 * Time: 20:21
 */

namespace DealerBundle\Admin;

use DealerBundle\Entity\Dealer;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

/**
 * Class DealerAdmin
 * @package CarBundle\Admin
 */
class DealerAdmin extends AbstractAdmin
{
    /**
     * Configure form field
     *
     * Define form fields and set configuration and attributes for fields
     *
     * @param FormMapper $form
     */
    protected function configureFormFields(FormMapper $form)
    {
        $form
            ->add('city', TextType::class, [
                'label' => 'City',
                'required' => false,
                'attr' => [
                    'placeholder' => 'City'
                ]
            ])
            ->add('street', TextType::class, [
                'label' => 'Street',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Street'
                ]
            ])
            ->add('number', NumberType::class, [
                'label' => 'Number',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Number'
                ]
            ])
            ->add('phone', NumberType::class, [
                'label' => 'Phone',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Phone'
                ]
            ])
            ->add('postCode', NumberType::class, [
                'label' => 'Post code',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Post Code'
                ]
            ]);
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
        $filter
            ->add('city', null, ['label' => 'City'])
            ->add('phone', null, ['label' => 'Phone'])
            ->add('postCode', null, ['label' => 'Post code']);
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
            ->addIdentifier('city', null, [
                'label' => 'City',
                'row_align' => 'left'
            ])
            ->addIdentifier('phone', null, [
                'label' => 'Phone',
                'row_align' => 'left'
            ])
            ->addIdentifier('postCode', null, [
                'label' => 'Post code',
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
        if ($object instanceof Dealer) {
            return $object->getCity();
        }
    }
}