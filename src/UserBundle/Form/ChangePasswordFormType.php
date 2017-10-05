<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\Validator\Constraints\UserPassword;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

/**
 * Class ChangePasswordFormType
 *
 * Override default fos_user form which use for change password for current user
 *
 * @package UserBundle\Form
 */
class ChangePasswordFormType extends AbstractType
{
    /**
     * @var string $class
     */
    private $class;

    /**
     * ChangePasswordFormType constructor
     *
     * @param string $class The User class name
     */
    public function __construct($class)
    {
        $this->class = $class;
    }

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
        $constraintsOptions = [
            'message' => 'fos_user.current_password.invalid',
        ];

        if (!empty($options['validation_groups'])) {
            $constraintsOptions['groups'] = [
                reset($options['validation_groups'])
            ];
        }

        $builder->add('current_password', PasswordType::class, [
            'label' => 'form.current_password',
            'translation_domain' => 'FOSUserBundle',
            'mapped' => false,
            'required' => false,
            'constraints' => new UserPassword($constraintsOptions),
            'attr' => [
                'placeholder' => 'form.current_password'
            ]
        ]);

        $builder->add('plainPassword', RepeatedType::class, [
            'type' => PasswordType::class,
            'required' => false,
            'options' => [
                'translation_domain' => 'FOSUserBundle',
            ],
            'first_options' => [
                'label' => 'form.new_password',
                'required' => false,
                'attr' => [
                    'placeholder' => 'form.new_password',
                ]
            ],
            'second_options' => [
                'label' => 'form.new_password_confirmation',
                'required' => false,
                'attr' => [
                    'placeholder' => 'form.new_password_confirmation'
                ]
            ],
            'invalid_message' => 'fos_user.password.mismatch',
        ]);
    }

    /**
     * Configuration options
     *
     * Set configuration params for current form
     *
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => $this->class,
            'csrf_token_id' => 'change_password',
            // BC for SF < 2.8
            'intention' => 'change_password',
        ]);
    }

    /**
     * Get block prefix form
     *
     * @return string
     */
    public function getBlockPrefix()
    {
        return 'fos_user_change_password';
    }


    /**
     * Get form name
     *
     * @return null|string
     */
    public function getName()
    {
        return $this->getBlockPrefix();
    }
}
