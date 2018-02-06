<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class RegistrationServiceType
 * @package AppBundle\Form
 */
class RegistrationServiceType extends AbstractType
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
            ->add('firstName', TextType::class, [
                'label' => 'First Name',
                'required' => false,
                'attr' => [
                    'placeholder' => 'First name'
                ]
            ])
            ->add('lastName', TextType::class, [
                'label' => 'Last Name',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Last name'
                ]
            ])
            ->add('phone', NumberType::class, [
                'label' => 'Phone',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Phone'
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Email'
                ]
            ])
            ->add('model', EntityType::class, [
                'class' => 'CarBundle:Model',
                'choice_label' => 'name',
                'multiple' => false,
                'required' => false,
            ])
            ->add('vin', NumberType::class, [
                'label' => 'Vin',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Vin'
                ]
            ])
            ->add('mileage', NumberType::class, [
                'label' => 'Mileage',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Mileage'
                ]
            ])
            ->add('licensePlate', NumberType::class, [
                'label' => 'License plate',
                'required' => false,
                'attr' => [
                    'placeholder' => 'License plate'
                ]
            ])
            ->add('dealer', EntityType::class, [
                'class' => 'DealerBundle:Dealer',
                'choice_label' => 'name',
                'multiple' => false,
                'required' => false,
            ])
            ->add('date', DateTimeType::class, [
                'placeholder' => [
                    'year' => 'Year', 'month' => 'Month', 'day' => 'Day',
                    'hour' => 'Hour', 'minute' => 'Minute', 'second' => 'Second',
                ],
                'input' => 'timestamp',
                'years' => range(date("Y", 0), date("Y"))
            ])
            ->add('submit', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-success'
                ]
            ])
        ;
    }

    /**
     * Configure options
     *
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\CarService'
        ]);
    }

    /**
     * Get block prefix
     *
     * @return string
     */
    public function getBlockPrefix()
    {
        return 'app_bundle_registration_service_type';
    }
}
