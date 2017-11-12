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
                'translation_domain' => 'FuelType',
                'label' => 'form.label.city',
                'required' => false,
                'mapped' => false,
                'attr' => [
                    'placeholder' => 'form.placeholder.city',
                    'value' => $data->getCity()
                ],
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('country', NumberType::class, [
                'translation_domain' => 'FuelType',
                'label' => 'form.label.country',
                'mapped' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'form.placeholder.country',
                    'value' => $data->getCountry()
                ],
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('combined', NumberType::class, [
                'translation_domain' => 'FuelType',
                'label' => 'form.label.combined',
                'mapped' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'form.placeholder.combined',
                    'value' => $data->getCombined()
                ],
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('emission', NumberType::class, [
                'translation_domain' => 'FuelType',
                'label' => 'form.label.emission',
                'mapped' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'form.placeholder.emission',
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
