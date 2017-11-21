<?php

namespace CarBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

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
//        $data = $options['data'];

        $builder
            ->add('acceleration', NumberType::class, [
                'translation_domain' => 'DynamicsType',
                'label' => 'form.label.acceleration',
                'required' => false,
                'mapped' => false,
                'attr' => [
                    'placeholder' => 'form.placeholder.acceleration',
//                    'value' => $data->getAcceleration()
                ],
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('speed', NumberType::class, [
                'translation_domain' => 'DynamicsType',
                'label' => 'form.label.speed',
                'required' => false,
                'mapped' => false,
                'attr' => [
                    'placeholder' => 'form.placeholder.speed',
//                    'value' => $data->getSpeed()
                ],
                'constraints' => [
                    new NotBlank()
                ]
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
