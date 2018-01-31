<?php
/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 24.01.18
 * Time: 21:41
 */

namespace AppBundle\Admin;

use AppBundle\Entity\Offers;
use AppBundle\Entity\OffersCategory;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

/**
 * Class OffersAdmin
 * @package AppBundle\Admin
 */
class OffersAdmin extends AbstractAdmin
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
            ->add('title', TextType::class, [
                'label' => 'Title',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Title'
                ]
            ])
            ->add('shortDescription', TextareaType::class, [
                'label' => 'Short description',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Short description'
                ]
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description',
                'required' => false,
                'attr' => [
                    'class' => 'tinymce',
                    'data-theme' => 'bbcode',
                    'placeholder' => 'Description',
                    'tinymce'=>'{"theme":"simple"}'// Skip it if you want to use default theme
                ]
            ])
            ->add('offersImage', 'sonata_media_type', [
                'provider' => 'sonata.media.provider.image',
                'context' => 'OffersLogo'
            ])
            ->add('offersCategory', 'sonata_type_model', [
                'class' => 'AppBundle:OffersCategory',
                'multiple' => false
            ])
        ;
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
            ->add('title', null, ['label' => 'Title']);
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
            ->addIdentifier('title', null, [
                'label' => 'Title',
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
        if ($object instanceof Offers) {
            return $object->getTitle();
        }

        return 'Offers';
    }
}