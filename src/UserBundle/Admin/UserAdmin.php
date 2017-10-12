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
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use UserBundle\Entity\User;

/**
 * Class UserAdmin
 * @package UserBundle\Admin
 */
class UserAdmin extends AbstractAdmin
{
    /**
     * @var string $translationDomain
     */
    protected $translationDomain = 'SonataUserBundle';

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
                'label' => 'form.label.username',
                'translation_domain' => 'SonataUserBundle',
                'attr' => [
                    'placeholder' => 'form.placeholder.username'
                ],
                'required' => false,
                'constraints' => [
                    new NotBlank(),
                    new Length([
                        'min' => 3,
                        'max' => 45
                    ])
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'form.label.email',
                'translation_domain' => 'SonataUserBundle',
                'attr' => [
                    'placeholder' => 'form.placeholder.email'
                ],
                'required' => false,
                'constraints' => [
                    new NotBlank(),
                    new Length([
                        'min' => 7,
                        'max' => 45
                    ]),
                ]
            ])
            ->add('password', PasswordType::class, [
                'label' => 'form.label.password',
                'translation_domain' => 'SonataUserBundle',
                'attr' => [
                    'placeholder' => 'form.placeholder.password'
                ],
                'required' => false,
                'constraints' => [
                    new NotBlank(),
                    new Length([
                        'min' => 5,
                        'max' => 45
                    ])
                ]
            ])
            ->add('roles', ChoiceType::class, [
                'label' => 'form.label.roles',
                'translation_domain' => 'SonataUserBundle',
                'placeholder' => 'form.placeholder.roles',
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
                'translation_domain' => 'SonataUserBundle',
                'label' => 'form.label.enable',
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
            ->add('id', null, ['label' => 'datagrid.filters.id'])
            ->add('username', null, ['label' => 'datagrid.filters.username'])
            ->add('email', null, ['label' => 'datagrid.filters.email']);
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
                'label' => 'datagrid.list.id',
                'row_align' => 'left',
            ])
            ->addIdentifier('username', null, ['label' => 'datagrid.list.username'])
            ->addIdentifier('email', null, ['label' => 'datagrid.list.email']);
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