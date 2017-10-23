<?php
/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 23.10.17
 * Time: 22:19
 */

namespace CarBundle\Admin;

use CarBundle\Entity\TransmissionType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Vich\UploaderBundle\Form\Type\VichImageType;

/**
 * Class TransmissionTypeAdmin
 * @package CarBundle\Admin
 */
class TransmissionTypeAdmin extends AbstractAdmin
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
        $form->add('title', TextType::class, [
                'label' => 'Title',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Title'
                ]
            ]);
    }

    /**
     * Configure datagrid filters
     *
     * Configure datagrid filters which will used for filtered and sort
     * the list of transmission type
     *
     * @param DatagridMapper $filter
     */
    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter->add('title');
    }

    /**
     * Configure list fields
     *
     * Specific fields which are show all transmission type are listed
     *
     * @param ListMapper $list
     */
    protected function configureListFields(ListMapper $list)
    {
        $list
            ->addIdentifier('id', null, ['row_align' => 'left'])
            ->addIdentifier('title', null, ['row_align' => 'left'])
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
        if ($object instanceof TransmissionType) {
            return $object->getTitle();
        }

        return 'TransmissionType';
    }
}