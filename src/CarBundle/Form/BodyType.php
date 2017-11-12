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
                'translation_domain' => 'BodyType',
                'label' => 'form.label.length',
                'required' => false,
                'mapped' => false,
                'attr' => [
                    'placeholder' => 'form.placeholder.length',
                    'value' => $data->getLength(),
                ],
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('width', NumberType::class, [
                'translation_domain' => 'BodyType',
                'label' => 'form.label.width',
                'required' => false,
                'mapped' => false,
                'attr' => [
                    'placeholder' => 'form.placeholder.width',
                    'value' => $data->getWidth(),
                ],
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('height', NumberType::class, [
                'translation_domain' => 'BodyType',
                'label' => 'form.label.height',
                'required' => false,
                'mapped' => false,
                'attr' => [
                    'placeholder' => 'form.label.height',
                    'value' => $data->getHeight(),
                ],
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('wheel_base', NumberType::class, [
                'translation_domain' => 'BodyType',
                'label' => 'form.label.wheel_base',
                'required' => false,
                'mapped' => false,
                'attr' => [
                    'placeholder' => 'form.placeholder.wheel_base',
                    'value' => $data->getWheelBase(),
                ],
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('aerodynamic_coefficient', NumberType::class, [
                'translation_domain' => 'BodyType',
                'label' => 'form.label.aerodynamic_coefficient',
                'required' => false,
                'mapped' => false,
                'attr' => [
                    'placeholder' => 'form.placeholder.aerodynamic_coefficient',
                    'value' => $data->getAerodynamicCoefficient(),
                ],
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('weight', NumberType::class, [
                'translation_domain' => 'BodyType',
                'label' => 'form.label.weight',
                'required' => false,
                'mapped' => false,
                'attr' => [
                    'placeholder' => 'form.placeholder.weight',
                    'value' => $data->getWeight()
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
