<?php

namespace CarBundle\Form;

use Symfony\Component\Form\AbstractType;
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
        $data = $options['data'];

        $builder
            ->add('length', NumberType::class, [
                'label' => 'Length',
                'required' => false,
                'mapped' => false,
                'attr' => [
                    'placeholder' => 'Length',
                    'value' => $data->getLength(),
                ],
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('width', NumberType::class, [
                'label' => 'Width',
                'required' => false,
                'mapped' => false,
                'attr' => [
                    'placeholder' => 'Width',
                    'value' => $data->getWidth(),
                ],
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('height', NumberType::class, [
                'label' => 'Height',
                'required' => false,
                'mapped' => false,
                'attr' => [
                    'placeholder' => 'Height',
                    'value' => $data->getHeight(),
                ],
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('wheel_base', NumberType::class, [
                'label' => 'Wheel base',
                'required' => false,
                'mapped' => false,
                'attr' => [
                    'placeholder' => 'Wheel base',
                    'value' => $data->getWheelBase(),
                ],
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('aerodynamic_coefficient', NumberType::class, [
                'label' => 'Aerodynamic Coefficient',
                'required' => false,
                'mapped' => false,
                'attr' => [
                    'placeholder' => 'Aerodynamic Coefficient',
                    'value' => $data->getAerodynamicCoefficient(),
                ],
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('weight', NumberType::class, [
                'label' => 'Weight',
                'required' => false,
                'mapped' => false,
                'attr' => [
                    'placeholder' => 'Weight',
                    'value' => $data->getWeight()
                ],
                'constraints' => [
                    new NotBlank()
                ]
            ]);
    }

    /**
     * Configure options
     *
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {

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
