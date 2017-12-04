<?php

namespace CarBundle\Form;

use CarBundle\Entity\Car;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * Class BodyType
 * @package CarBundle\Form
 */
class BodyType extends AbstractType
{
    /**
     * Build form
     *
     * Define form field and set attributes for each form field
     *
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('length', NumberType::class, [
                'translation_domain' => 'BodyType',
                'label' => 'form.label.length',
                'required' => false,
                'attr' => [
                    'placeholder' => 'form.placeholder.length',
                ],
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('width', NumberType::class, [
                'translation_domain' => 'BodyType',
                'label' => 'form.label.width',
                'required' => false,
                'attr' => [
                    'placeholder' => 'form.placeholder.width',
                ],
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('height', NumberType::class, [
                'translation_domain' => 'BodyType',
                'label' => 'form.label.height',
                'required' => false,
                'attr' => [
                    'placeholder' => 'form.label.height',
                ],
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('wheel_base', NumberType::class, [
                'translation_domain' => 'BodyType',
                'label' => 'form.label.wheel_base',
                'required' => false,
                'attr' => [
                    'placeholder' => 'form.placeholder.wheel_base',
                ],
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('aerodynamic_coefficient', NumberType::class, [
                'translation_domain' => 'BodyType',
                'label' => 'form.label.aerodynamic_coefficient',
                'required' => false,
                'attr' => [
                    'placeholder' => 'form.placeholder.aerodynamic_coefficient',
                ],
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('weight', NumberType::class, [
                'translation_domain' => 'BodyType',
                'label' => 'form.label.weight',
                'required' => false,
                'attr' => [
                    'placeholder' => 'form.placeholder.weight',
                ],
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('car', EntityType::class, [
                'class' => Car::class,
                'choice_label' => 'id'
            ])
        ;
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
            'data_class' => 'CarBundle\Entity\Body'
        ]);
    }

    /**
     * Get block prefix
     *
     * @return string
     */
    public function getBlockPrefix()
    {
        return 'car_bundle_body_type';
    }
}
