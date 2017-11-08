<?php

/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 19.10.17
 * Time: 23:06
 */
namespace CarBundle\Admin;

use CarBundle\Entity\Body;
use CarBundle\Entity\Car;
use CarBundle\Entity\Dynamics;
use CarBundle\Entity\Fuel;
use CarBundle\Form\BodyType;
use CarBundle\Form\DynamicsType;
use CarBundle\Form\FuelType;
use CarBundle\Helper\BodyHelper;
use CarBundle\Helper\DynamicsHelper;
use CarBundle\Helper\FuelHelper;
use Doctrine\ORM\Mapping as ORM;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

/**
 * Class ModelAdmin
 * @package CarBundle\Admin
 */
class CarAdmin extends AbstractAdmin
{
    /**
     * @var string $translationDomain
     */
    protected $translationDomain = 'SonataCarBundle';

    /**
     * Configure form field
     *
     * Set configuration for form field which are displayed on the edit
     * and create action
     *
     * @param FormMapper $form
     */
    protected function configureFormFields(FormMapper $form)
    {
        $bodyData = $this->getBodyRecordData();
        $dynamicsData = $this->getDynamicsRecordData();
        $fuelData = $this->getFuelRecordData();

        $bodyBuilder = $form->getFormBuilder()->getFormFactory()->createBuilder(BodyType::class, $bodyData);
        $fuelBuilder = $form->getFormBuilder()->getFormFactory()->createBuilder(FuelType::class, $fuelData);
        $dynamicsBuilder = $form->getFormBuilder()->getFormFactory()->createBuilder(DynamicsType::class, $dynamicsData);

        $form
            ->tab('Car')
                ->with('Car')
                    ->add('name', TextType::class, [
                        'label' => 'form.label.name',
                        'translation_domain' => 'SonataCarBundle',
                        'required' => false,
                        'attr' => [
                            'placeholder' => 'form.placeholder.name'
                        ]
                    ])
                    ->add('price', TextType::class, [
                        'label' => 'form.label.price',
                        'translation_domain' => 'SonataCarBundle',
                        'required' => false,
                        'attr' => [
                            'placeholder' => 'form.label.price'
                        ]
                    ])
                    ->add('model', EntityType::class, [
                        'class' => 'CarBundle:Model',
                        'choice_label' => 'name',
                        'multiple' => false,
                        'required' => false,
                    ])
                    ->add('model', 'sonata_type_model', [
                        'class' => 'CarBundle:Model',
                    ])
                    ->add('engine', 'sonata_type_model', [
                        'class' => 'CarBundle:Engine',
                    ])
                ->end()
            ->end()
            ->tab('Body')
                ->with('Body')
                    ->add($bodyBuilder->get('length'))
                    ->add($bodyBuilder->get('width'))
                    ->add($bodyBuilder->get('height'))
                    ->add($bodyBuilder->get('wheel_base'))
                    ->add($bodyBuilder->get('aerodynamic_coefficient'))
                    ->add($bodyBuilder->get('weight'))
                ->end()
            ->end()
            ->tab('Fuel')
                ->with('Fuel')
                    ->add($fuelBuilder->get('city'))
                    ->add($fuelBuilder->get('country'))
                    ->add($fuelBuilder->get('combined'))
                    ->add($fuelBuilder->get('emission'))
                ->end()
            ->end()
            ->tab('Dynamics')
                ->with('Dynamics')
                    ->add($dynamicsBuilder->get('acceleration'))
                    ->add($dynamicsBuilder->get('speed'))
                ->end()
            ->end()
        ;
    }

    /**
     * Extend prePersist event
     *
     * @param mixed $object
     */
    public function prePersist($object)
    {
        $data = $this->getFormData();

        $bodyHelper = new BodyHelper();
        $dynamicsHelper = new DynamicsHelper();
        $fuelHelper = new FuelHelper();

        $em = $this->getConfigurationPool()->getContainer()->get('doctrine')->getManager();

        $body = $bodyHelper->createBodyRecord($em, $data);
        $dynamics = $dynamicsHelper->createDynamicsRecord($em, $data);
        $fuel = $fuelHelper->createFuelRecord($em, $data);

        $object->setBody($body);
        $object->setDynamics($dynamics);
        $object->setFuel($fuel);
    }

    /**
     * Extent preUpdate event
     *
     * @param mixed $object
     */
    public function preUpdate($object)
    {
        $data = $this->getFormData();

        $bodyHelper = new BodyHelper();
        $dynamicsHelper = new DynamicsHelper();
        $fuelHelper = new FuelHelper();

        $em = $this->getConfigurationPool()->getContainer()->get('doctrine')->getManager();

        $body = $this->getBodyRecordData();
        $dynamics = $this->getDynamicsRecordData();
        $fuel = $this->getFuelRecordData();

        $bodyHelper->updateBodyRecord($em, $data, $body);
        $dynamicsHelper->updateDynamicsRecord($em, $data, $dynamics);
        $fuelHelper->updateFuelRecord($em, $data, $fuel);
    }

    /**
     * Get form data
     *
     * Get form data from send request
     *
     * @return mixed
     */
    public function getFormData()
    {
        $uniqid = $this->getRequest()->query->get('uniqid');

        return $this->getRequest()->request->get($uniqid);
    }

    /**
     * Configure datagrid filters
     *
     * Configure datagrid filters which will used for filtered and sort
     * the list of car
     *
     * @param DatagridMapper $filter
     */
    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter
            ->add('name', null, ['label' => 'datagrid.filters.name'])
            ->add('price', null, ['label' => 'Price']);
    }

    /**
     * Configure list fields
     *
     * Specific fields which are show all car are listed
     *
     * @param ListMapper $list
     */
    protected function configureListFields(ListMapper $list)
    {
        $list
            ->addIdentifier('id', null, [
                'label' => 'datagrid.list.id',
                'row_align' => 'left'
            ])
            ->addIdentifier('name', null, [
                'label' => 'datagrid.list.name'
            ])
            ->addIdentifier('price', null, [
                'label' => 'datagrid.list.price',
                'row_align' => 'left'
            ])
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
        if ($object instanceof Car) {
            return $object->getName();
        }

        return 'Car';
    }

    /**
     * Get fuel record data
     *
     * @return Body
     */
    public function getBodyRecordData()
    {
        $em = $this->getConfigurationPool()->getContainer()->get('doctrine')->getManager();

        $carId = $this->getRequest()->get('id');

        if ($carId) {
            return $em->getRepository('CarBundle:Car')->getBodyData($carId)->getBody();
        }

        return new Body();
    }

    /**
     * Get dynamics record data
     *
     * @return Dynamics
     */
    public function getDynamicsRecordData()
    {
        $em = $this->getConfigurationPool()->getContainer()->get('doctrine')->getManager();

        $carId = $this->getRequest()->get('id');

        if ($carId) {
            return $em->getRepository('CarBundle:Car')->getDynamicsData($carId)->getDynamics();
        }

        return new Dynamics();
    }

    /**
     * Get fuel record data
     *
     * @return Fuel
     */
    public function getFuelRecordData()
    {
        $em = $this->getConfigurationPool()->getContainer()->get('doctrine')->getManager();

        $carId = $this->getRequest()->get('id');

        if ($carId) {
            return $em->getRepository('CarBundle:Car')->getFuelData($carId)->getFuel();
        }

        return new Fuel();
    }
}