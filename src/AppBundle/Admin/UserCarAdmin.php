<?php
/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 31.01.18
 * Time: 22:57
 */

namespace AppBundle\Admin;

use AppBundle\Entity\UserCar;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

/**
 * Class UserCarAdmin
 * @package AppBundle\Admin
 */
class UserCarAdmin extends AbstractAdmin
{
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
            ->add('carName', TextType::class, [
                'label' => 'Car name',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Car name'
                ]
            ])
            ->add('user', EntityType::class, [
                'class' => 'UserBundle:User',
                'choice_label' => 'username',
                'multiple' => false,
                'required' => false,
            ])
            ->add('model', EntityType::class, [
                'class' => 'CarBundle:Model',
                'choice_label' => 'name',
                'multiple' => false,
                'required' => false,
            ])
            ->add('engine', EntityType::class, [
                'class' => 'CarBundle:Engine',
                'choice_label' => 'name',
                'multiple' => false,
                'required' => false,
            ])
            ->add('transmission', EntityType::class, [
                'class' => 'CarBundle:Transmission',
                'choice_label' => 'name',
                'multiple' => false,
                'required' => false,
            ])
            ->add('createdAt',DateType::class, [
                'input' => 'timestamp',
                'years' => range(date("Y", 0), date("Y"))
            ])
            ->add('color', TextType::class, [
                'label' => 'Color',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Color'
                ]
            ])
        ;
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
            ->addIdentifier('carName', null, ['label' => 'Car name'])
            ->add('user', null, ['label' => 'Username'])
            ->add('model', null, ['label' => 'Model'])
            ->add('_action',null, [
                'actions' => [
                    'delete' => [],
                    'edit' => []
                ],
            ]);
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
            ->add('carName', null, ['label' => 'Car name'])
            ->add('user', null, ['label' => 'Username'])
            ->add('model', null, ['label' => 'Model']);
    }

    /**
     * This receives the object to transform to a string as the first parameter
     *
     * @param mixed $object
     * @return string
     */
    public function toString($object)
    {
        if ($object instanceof UserCar) {
            return $object->getCarName();
        }

        return 'User car';
    }
}