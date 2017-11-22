<?php

namespace CarBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
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
    protected $test;
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('acceleration', NumberType::class, [
                'translation_domain' => 'DynamicsType',
                'label' => 'form.label.acceleration',
                'required' => false,
                'attr' => [
                    'placeholder' => 'form.placeholder.acceleration',
                ],
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('speed', NumberType::class, [
                'translation_domain' => 'DynamicsType',
                'label' => 'form.label.speed',
                'required' => false,
                'attr' => [
                    'placeholder' => 'form.placeholder.speed',
                ],
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('car', HiddenType::class)
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
            'data_class' => 'CarBundle\Entity\Dynamics'
        ]);
    }


    /**
     * Get block prefix
     *
     * @return string
     */
    public function getBlockPrefix()
    {
        return 'car_bundle_dynamics_type';
    }
}
