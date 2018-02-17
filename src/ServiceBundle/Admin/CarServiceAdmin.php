<?php
/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 10.02.18
 * Time: 14:12
 */

namespace ServiceBundle\Admin;

use ServiceBundle\Entity\CarService;
use ServiceBundle\Constants\RegistrationService;
use ServiceBundle\Form\ServiceActionType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Sonata\AdminBundle\Form\Type\CollectionType;

/**
 * Class CarServiceAdmin
 * @package AppBundle\Admin
 */
class CarServiceAdmin extends AbstractAdmin
{
    /**
     * Configure form field
     *
     * Set configuration for form field which are displayed on the edit
     * and create action
     *
     * @param FormMapper $form
     */
    public function configureFormFields(FormMapper $form)
    {
        $form
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
            ->add('car', EntityType::class, [
                'class' => 'CarBundle:Car',
                'choice_label' => 'name',
                'multiple' => false,
                'required' => false,
                'constraints' => [
                    new NotBlank(),
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
            ->add('userCar', EntityType::class, [
                'class' => 'AppBundle:UserCar',
                'choice_label' => 'car',
                'multiple' => false,
                'required' => false,
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
            ->add('status', 'sonata_type_model', [
                'class' => 'ServiceBundle:ServiceStatus',
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
                'months' => range(date("M", strtotime('-1 month')), RegistrationService::MONTH_COUNT),
                'hours' => range(RegistrationService::MIN_HOURS, RegistrationService::MAX_HOURS),
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('serviceAction', CollectionType::class, [
                'label' => 'Service action',
                'entry_type' => ServiceActionType::class,
                'allow_add' => true,
                'allow_delete' => true
            ])
        ;
    }

    /**
     * Post persist event
     *
     * @param mixed $object
     */
    public function postPersist($object)
    {
        $actionList = $object->getServiceAction();

        $this->setRelationData($actionList, $object);
    }

    /**
     * Post update event
     *
     * @param mixed $object
     */
    public function postUpdate($object)
    {
        $actionList = $object->getServiceAction();

        $this->setRelationData($actionList, $object);
    }


    /**
     * Set relation data
     *
     * @param $collection
     * @param CarService $carService
     */
    public function setRelationData($collection, CarService $carService)
    {
        if ($collection) {
            $em = $this->getConfigurationPool()->getContainer()->get('doctrine')->getManager();

            foreach ($collection as $item) {
                $item->setCarService($carService);
                $em->persist($item);
                $em->flush();
            }
        }
    }

    /**
     * Configure datagrid filters
     *
     * Configure datagrid filters which will used for filtered and sort
     * the list of model
     *
     * @param DatagridMapper $filter
     */
    public function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter
            ->add('firstName', null, ['placeholder' => 'First name'])
            ->add('lastName', null, ['placeholder' => 'Last name'])
            ->add('email', null, ['placeholder' => 'Email'])
            ->add('phone', null, ['placeholder' => 'Phone'])
            ->add('car', null, ['placeholder' => 'Car name'])
            ->add('model', null, ['placeholder' => 'Model'])
            ->add('vin', null, ['placeholder' => 'Vin'])
            ->add('mileage', null, ['placeholder' => 'Mileage'])
            ->add('licensePlate', null, ['placeholder' => 'License Plate'])
            ->add('dealer', null, ['placeholder' => 'Dealer'])
            ->add('date', null, ['placeholder' => 'Date'])
            ->add('status', null, ['placeholder' => 'Status']);
    }

    /**
     * Configure list fields
     *
     * Specific fields which are show all model are listed
     *
     * @param ListMapper $list
     */
    public function configureListFields(ListMapper $list)
    {
        $list
            ->addIdentifier('firstName', null, ['placeholder' => 'First name', 'row_align' => 'left'])
            ->addIdentifier('lastName', null, ['placeholder' => 'Last name', 'row_align' => 'left'])
            ->addIdentifier('email', null, ['placeholder' => 'Email', 'row_align' => 'left'])
            ->addIdentifier('phone', null, ['placeholder' => 'Phone', 'row_align' => 'left'])
            ->addIdentifier('car', null, ['placeholder' => 'Car name', 'row_align' => 'left'])
            ->addIdentifier('vin', null, ['placeholder' => 'Vin', 'row_align' => 'left'])
            ->addIdentifier('mileage', null, ['placeholder' => 'Mileage', 'row_align' => 'left'])
            ->addIdentifier('licensePlate', null, ['placeholder' => 'License Plate', 'row_align' => 'left'])
            ->addIdentifier('dealer', null, ['placeholder' => 'Dealer', 'row_align' => 'left'])
            ->add('status', null, ['placeholder' => 'Status'])
            ->add('_action', null, [
                'actions' => [
                    'delete' => [],
                    'edit' => []
                ]
            ]);
    }

    /**
     * This receives the object to transform to a string as the first parameter
     *
     * @param mixed $object
     * @return string
     */
    public function toString($object)
    {
        if ($object instanceof CarService) {
            return $object->getId();
        }

        return 'Car service';
    }
}