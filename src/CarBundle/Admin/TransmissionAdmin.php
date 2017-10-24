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
                'label' => 'Name',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Name'
                ]
            ])
            ->add('steps', NumberType::class, [
                'label' => 'Steps',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Steps'
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
            ->add('name', null, ['label' => 'Name'])
            ->add('steps', null, ['label' => 'Steps'])
            ->add('type', null, ['label' => 'Type']);
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
            ->addIdentifier('id', null, ['label' => 'Id', 'row_align' => 'left'])
            ->addIdentifier('name', null, ['label' => 'Steps'])
            ->addIdentifier('type', null, ['label' => 'Type']);
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