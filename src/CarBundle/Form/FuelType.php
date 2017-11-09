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
        $data = $options['data'];

        $builder
            ->add('city', NumberType::class, [
                'label' => 'City',
                'required' => false,
                'mapped' => false,
                'attr' => [
                    'placeholder' => 'City',
                    'value' => $data->getCity()
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
                    'placeholder' => 'Country',
                    'value' => $data->getCountry()
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
                    'value' => $data->getCombined()
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
                    'placeholder' => 'Emission',
                    'value' => $data->getEmission()
                ],
                'constraints' => [
                    new NotBlank()
                ]
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

    }

    public function getBlockPrefix()
    {
        return 'car_bundle_fuel_type';
    }
}
