<?php

namespace UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class RegistrationType
 *
 * Override default fos_user form which use for register new user
 *
 * @package UserBundle\Form
 */
class RegistrationType extends AbstractType
{
    /**
     * Build form
     *
     * Define form fields and set params and attributes for defined fields
     *
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, [
                'required' => false,
                'label' => 'form.email',
                'translation_domain' => 'FOSUserBundle',
                'attr' => [
                    'placeholder' => 'form.placeholder.email',
                    'class' => 'form-control',
                ],
            ])
            ->add('username', null, [
                'required' => false,
                'label' => 'form.username',
                'translation_domain' => 'FOSUserBundle',
                'attr' => [
                    'placeholder' => 'form.placeholder.username',
                    'class' => 'form-control'
                ]
            ])
            ->add('plainPassword', RepeatedType::class, [
                'required' => false,
                'type' => PasswordType::class,
                'options' => ['translation_domain' => 'FOSUserBundle'],
                'first_options' => [
                    'required' => false,
                    'label' => 'form.password',
                    'attr' => [
                        'placeholder' => 'form.placeholder.password_first',
                        'class' => 'form-control'
                    ]
                ],
                'second_options' => [
                    'required' => false,
                    'label' => 'form.password_confirmation',
                    'attr' => [
                        'placeholder' => 'form.placeholder.password_second',
                        'class' => 'form-control'
                    ]
                ],
                'invalid_message' => 'fos_user.password.mismatch',
            ])
        ;
    }

    /**
     * Get parent form witch we will extends
     *
     * @return string
     */
    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

    /**
     * Get block prefix
     *
     * @return string
     */
    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

    /**
     * Get form name
     *
     * @return string
     */
    public function getName()
    {
        return $this->getBlockPrefix();
    }
}