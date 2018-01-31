<?php
/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 31.01.18
 * Time: 22:57
 */

namespace AppBundle\Admin;

use AppBundle\Entity\OffersCategory;
use AppBundle\Entity\UserCar;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\CoreBundle\Form\Type\DateTimePickerType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class UserCarAdmin extends AbstractAdmin
{
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
            ->add('createAt', DateTimePickerType::class)
            ->add('color', TextType::class, [
                'label' => 'Color',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Color'
                ]
            ])
        ;
    }

    protected function configureListFields(ListMapper $list)
    {
        $list
            ->add('carName', null, ['label' => 'Car name'])
            ->add('user', null, ['label' => 'Username'])
            ->add('model', null, ['label' => 'Model']);
    }

    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter
            ->add('carName', null, ['label' => 'Car name'])
            ->add('user', null, ['label' => 'Username'])
            ->add('model', null, ['label' => 'Model']);
    }

    public function toString($object)
    {
        if ($object instanceof UserCar) {
            return $object->getCarName();
        }

        return 'User car';
    }
}