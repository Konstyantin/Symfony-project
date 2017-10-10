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

class UserAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $form)
    {
        $form
            ->add('username', TextType::class)
            ->add('email', EmailType::class)
            ->add('enabled', CheckboxType::class)
            ->add('password', PasswordType::class)
            ->add('roles', ChoiceType::class, [
                'placeholder' => 'Choose an role',
                'choices' => [
                    'ROLE_OAUTH' => 'ROLE_OAUTH',
                    'ROLE_ADMIN' => 'ROLE_ADMIN',
                    'ROLE_SUPER_ADMIN' => 'ROLE_ADMIN',
                ],
            ])
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter
            ->add('id')
            ->add('username')
            ->add('email');
    }

    protected function configureListFields(ListMapper $list)
    {
        $list->addIdentifier('id')
            ->addIdentifier('username')
            ->addIdentifier('email');
    }

    public function toString($object)
    {
        if ($object instanceof User) {
            return $object->getUsername();
        }
        return 'User'; // shown in the breadcrumb on the create view
    }
}