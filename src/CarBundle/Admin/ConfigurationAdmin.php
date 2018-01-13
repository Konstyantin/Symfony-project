<?php
/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 13.01.18
 * Time: 14:55
 */

namespace CarBundle\Admin;

use CarBundle\Entity\Configuration;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
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
            ->add('carName', TextType::class, [
                'label' => 'Car name',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Car name'
                ]
            ])
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