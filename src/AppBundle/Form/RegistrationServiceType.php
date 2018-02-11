<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Doctrine\ORM\EntityRepository;

/**
 * Class RegistrationServiceType
 * @package AppBundle\Form
 */
class RegistrationServiceType extends AbstractType
{
    /**
     * Count month in year
     */
    const MONTH_COUNT = 12;

    /**
     * Min hours work service
     */
    const MIN_HOURS = 9;

    /**
     * Max hour work service
     */
    const MAX_HOURS = 20;

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
        $userId = $options['user'];

        $builder
            ->add('firstName', TextType::class, [
                'label' => 'First Name',
                'required' => false,
                'attr' => [
                    'placeholder' => 'First name'
                ],
                'constraints' => [
                    new NotBlank(),
                    new Length([
                        'min' => 3,
                        'max' => 45
                    ])
                ]
            ])
            ->add('lastName', TextType::class, [
                'label' => 'Last Name',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Last name'
                ],
                'constraints' => [
                    new NotBlank(),
                    new Length([
                        'min' => 3,
                        'max' => 45
                    ])
                ]
            ])
            ->add('phone', NumberType::class, [
                'label' => 'Phone',
                'required' => false,
                'attr' => [
                    'placeholder' => '38066...'
                ],
                'constraints' => [
                    new NotBlank(),
                    new Length([
                        'min' => 10,
                        'max' => 13
                    ])
                ]
            ])
            ->add('email', TextType::class, [
                'label' => 'Email',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Email'
                ],
                'constraints' => [
                    new NotBlank(),
                    new Email()
                ]
            ])
            ->add('carName', TextType::class, [
                'label' => 'Car name',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Car name'
                ],
                'constraints' => [
                    new NotBlank(),
                    new Length([
                        'min' => 3,
                        'max' => 15
                    ])
                ]
            ])
            ->add('model', EntityType::class, [
                'class' => 'CarBundle:Model',
                'choice_label' => 'name',
                'multiple' => false,
                'required' => false,
                'query_builder' => function (EntityRepository $er) use ($userId) {
                    return $er->createQueryBuilder('model')
                        ->join('AppBundle:UserCar', 'user_car', 'WITH', 'model.id = user_car.model')
                        ->where('user_car.user =:userId')
                        ->setParameter('userId', $userId)
                        ->orderBy('model.id', 'ASC');
                },
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('vin', NumberType::class, [
                'label' => 'Vin',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Vin'
                ],
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('mileage', NumberType::class, [
                'label' => 'Mileage',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Mileage'
                ],
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('licensePlate', NumberType::class, [
                'label' => 'License plate',
                'required' => false,
                'attr' => [
                    'placeholder' => 'License plate'
                ],
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('dealer', EntityType::class, [
                'class' => 'DealerBundle:Dealer',
                'choice_label' => 'name',
                'multiple' => false,
                'required' => false,
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('date', DateTimeType::class, [
                'placeholder' => [
                    'year' => 'Year', 'month' => 'Month', 'day' => 'Day',
                    'hour' => 'Hour', 'minute' => 'Minute', 'second' => 'Second',
                ],
                'required' => false,
                'input' => 'timestamp',
                'years' => range(date("Y"), date("Y")),
                'months' => range(date("M", strtotime('-1 month')), self::MONTH_COUNT),
                'hours' => range(self::MIN_HOURS, self::MAX_HOURS),
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('submit', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-service-register'
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
            'data_class' => 'AppBundle\Entity\CarService',
            'user' => null
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
