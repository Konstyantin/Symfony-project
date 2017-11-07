<?php

namespace CarBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class FuelType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('city', NumberType::class, [
                'label' => 'City',
                'required' => false,
                'mapped' => false,
                'attr' => [
                    'placeholder' => 'City'
                ],
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('country', NumberType::class, [
                'label' => 'Country',
                'mapped' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Country'
                ],
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('combined', NumberType::class, [
                'label' => 'Combined',
                'mapped' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Combined',
                ],
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('emission', NumberType::class, [
                'label' => 'Emission',
                'mapped' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Emission'
                ],
                'constraints' => [
                    new NotBlank()
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'car_bundle_fuel_type';
    }
}
