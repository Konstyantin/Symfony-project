<?php

namespace CarBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * Class DynamicsType
 * @package CarBundle\Form
 */
class DynamicsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('acceleration', NumberType::class, [
                'label' => 'Acceleration',
                'required' => false,
                'mapped' => false,
                'attr' => [
                    'placeholder' => 'Acceleration'
                ],
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('speed', NumberType::class, [
                'label' => 'Speed',
                'required' => false,
                'mapped' => false,
                'attr' => [
                    'placeholder' => 'Speed'
                ],
                'constraints' => [
                    new NotBlank()
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'car_bundle_dynamics_type';
    }
}
