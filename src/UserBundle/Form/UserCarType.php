<?php

namespace UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * Class UserCarType
 * @package UserBundle\Form
 */
class UserCarType extends AbstractType
{
    /**
     * Build form
     *
     * Define form fields and set params and attributes for defined fields
     *
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('car', EntityType::class, [
                'class' => 'CarBundle:Car',
                'choice_label' => 'name',
                'multiple' => false,
                'required' => false,
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('model', EntityType::class, [
                'class' => 'CarBundle:Model',
                'choice_label' => 'name',
                'multiple' => false,
                'required' => false,
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('engine', EntityType::class, [
                'class' => 'CarBundle:Engine',
                'choice_label' => 'name',
                'multiple' => false,
                'required' => false,
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('transmission', EntityType::class, [
                'class' => 'CarBundle:Transmission',
                'choice_label' => 'name',
                'multiple' => false,
                'required' => false,
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('createdAt',DateType::class, [
                'input' => 'timestamp',
                'years' => range(date("Y", 0), date("Y")),
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('color', TextType::class, [
                'label' => 'Color',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Color'
                ],
                'constraints' => [
                    new NotBlank(),
                    new Length([
                        'min' => 3,
                        'max' => 20
                    ])
                ]
            ])
            ->add('submit', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-user-car'
                ]
            ])
        ;
    }

    /**
     * Configuration options
     *
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\UserCar'
        ]);
    }

    /**
     * Get block prefix
     *
     * @return string
     */
    public function getBlockPrefix()
    {
        return 'user_bundle_user_car_type';
    }
}
