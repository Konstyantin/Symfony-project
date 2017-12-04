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

class FuelType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('city', NumberType::class, [
                'translation_domain' => 'FuelType',
                'label' => 'form.label.city',
                'required' => false,
                'attr' => [
                    'placeholder' => 'form.placeholder.city',
                ],
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('country', NumberType::class, [
                'translation_domain' => 'FuelType',
                'label' => 'form.label.country',
                'required' => false,
                'attr' => [
                    'placeholder' => 'form.placeholder.country',
                ],
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('combined', NumberType::class, [
                'translation_domain' => 'FuelType',
                'label' => 'form.label.combined',
                'required' => false,
                'attr' => [
                    'placeholder' => 'form.placeholder.combined',
                ],
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('emission', NumberType::class, [
                'translation_domain' => 'FuelType',
                'label' => 'form.label.emission',
                'required' => false,
                'attr' => [
                    'placeholder' => 'form.placeholder.emission',
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
            'data_class' => 'CarBundle\Entity\Fuel'
        ]);
    }

    /**
     * Get block prefix
     *
     * @return string
     */
    public function getBlockPrefix()
    {
        return 'car_bundle_fuel_type';
    }
}
