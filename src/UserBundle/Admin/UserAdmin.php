<?php

/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 10.10.17
 * Time: 21:48
 */
namespace UserBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use UserBundle\Entity\User;

/**
 * Class UserAdmin
 * @package UserBundle\Admin
 */
class UserAdmin extends AbstractAdmin
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
            ->add('username', TextType::class,[
                'label' => 'Username'
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email'
            ])
            ->add('password', PasswordType::class, [
                'label' => 'Password',
            ])
            ->add('roles', ChoiceType::class, [
                'label' => 'Roles',
                'placeholder' => 'Choose an role',
                'choices' => [
                    'ROLE_OAUTH' => 'ROLE_OAUTH',
                    'ROLE_ADMIN' => 'ROLE_ADMIN',
                    'ROLE_SUPER_ADMIN' => 'ROLE_ADMIN',
                ],
                'multiple' => true,
                'preferred_choices' => array('muppets', 'arr')
            ])
            ->add('enabled', CheckboxType::class, [
                'required' => false,
                'label' => 'Enabled'
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
            ->add('id')
            ->add('username')
            ->add('email');
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
                'row_align' => 'left',
            ])
            ->addIdentifier('username')
            ->addIdentifier('email');
    }

    /**
     * This receives the object to transform to a string as the first parameter
     *
     * @param mixed $object
     * @return string
     */
    public function toString($object)
    {
        if ($object instanceof User) {
            return $object->getUsername();
        }
        return 'User'; // shown in the breadcrumb on the create view
    }
}