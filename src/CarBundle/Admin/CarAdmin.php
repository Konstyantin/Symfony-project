<?php

/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 19.10.17
 * Time: 23:06
 */
namespace CarBundle\Admin;

use CarBundle\Entity\Car;
use CarBundle\Form\BodyType;
use CarBundle\Form\DynamicsType;
use CarBundle\Form\FeatureType;
use CarBundle\Form\FuelType;
use Doctrine\ORM\Mapping as ORM;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\CollectionType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Vich\UploaderBundle\Form\Type\VichImageType;

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
                        'multiple' => true
                    ])
                    ->add('transmission', 'sonata_type_model', [
                        'class' => 'CarBundle:Transmission',
                        'multiple' => true
                    ])
                    ->add('feature', CollectionType::class, [
                        'label' => 'Feature',
                        'entry_type' => FeatureType::class,
                        'allow_add' => true,
                        'allow_delete' => true
                    ])
                    ->add('imageLogo', 'sonata_media_type', [
                        'provider' => 'sonata.media.provider.image',
                        'context' => 'CarLogo'
                    ])
                    ->add('imagePreview', 'sonata_media_type', [
                        'provider' => 'sonata.media.provider.image',
                        'context' => 'CarPreview'
                    ])
                ->end()
            ->end()
            ->tab('Body')
                ->with('Body')
                    ->add('body', CollectionType::class, [
                        'label' => false,
                        'entry_type' => BodyType::class,
                        'allow_add' => true,
                        'allow_delete' => true
                    ])
                ->end()
            ->end()
            ->tab('Fuel')
                ->with('Fuel')
                    ->add('fuel', CollectionType::class, [
                        'label' => false,
                        'entry_type' => FuelType::class,
                        'allow_add' => true,
                        'allow_delete' => true
                    ])
                ->end()
            ->end()
            ->tab('Dynamics')
                ->with('Dynamics')
                    ->add('dynamics', CollectionType::class, [
                        'label' => false,
                        'entry_type' => DynamicsType::class,
                        'allow_add' => true,
                        'allow_delete' => true
                    ])
                ->end()
            ->end()
        ;
    }

    /**
     * Handle post persist event
     *
     * @param mixed $object
     */
    public function postPersist($object)
    {
        $bodyList = $object->getBody();
        $fuelList = $object->getFuel();
        $dynamicsList = $object->getDynamics();
        $featureList = $object->getFeature();

        $this->setRelationData($bodyList, $object);
        $this->setRelationData($fuelList, $object);
        $this->setRelationData($dynamicsList, $object);
        $this->setRelationData($featureList, $object);
    }

    /**
     * Handle post update event
     *
     * @param mixed $object
     */
    public function postUpdate($object)
    {
        $bodyList = $object->getBody();
        $fuelList = $object->getFuel();
        $dynamicsList = $object->getDynamics();
        $featureList = $object->getFeature();

        $this->setRelationData($bodyList, $object);
        $this->setRelationData($fuelList, $object);
        $this->setRelationData($dynamicsList, $object);
        $this->setRelationData($featureList, $object);
    }

    /**
     * Set relation data
     *
     * @param $collection
     * @param Car $car
     */
    public function setRelationData($collection, Car $car)
    {
        if ($collection) {
            $em = $this->getConfigurationPool()->getContainer()->get('doctrine')->getManager();

            foreach ($collection as $item) {
                $item->setCar($car);
                $em->persist($item);
                $em->flush();
            }
        }
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
}