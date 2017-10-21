<?php

/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 19.10.17
 * Time: 23:06
 */
namespace CarBundle\Admin;

use CarBundle\Entity\Model;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Vich\UploaderBundle\Form\Type\VichImageType;

/**
 * Class ModelAdmin
 * @package CarBundle\Admin
 */
class ModelAdmin extends AbstractAdmin
{
    /**
     * @var string $translationDomain
     */
    protected $translationDomain = 'SonataModelBundle';

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
            ->add('parent', EntityType::class, [
                'class' => 'AppBundle:Category',
                'choice_label' => 'name',
                'multiple' => false,
                'required' => false,
            ])
            ->add('name', TextType::class, [
                'label' => 'Name',
                'translation_domain' => 'SonataModelBundle',
                'required' => false,
                'attr' => [
                    'placeholder' => 'form.placeholder.name'
                ]
            ])
            ->add('imageFile', VichImageType::class, [
                'label' => false,
                'required' => false,
                'help' => $this->fullPathImage(),
                'allow_delete' => true,
                'download_link' => true,
            ])
        ;
    }

    /**
     * Configure datagrid filters
     *
     * Configure datagrid filters which will used for filtered and sort
     * the list of model
     *
     * @param DatagridMapper $filter
     */
    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter->add('name', null, ['label' => 'datagrid.filters.username']);
    }

    /**
     * Configure list fields
     *
     * Specific fields which are show all model are listed
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
                'label' => 'datagrid.list.username'
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
        if ($object instanceof Model) {
            return $object->getName();
        }

        return 'Model';
    }

    /**
     * Full path image
     *
     * Get full path image to upload image file model record
     *
     * @return bool|string
     */
    public function fullPathImage()
    {
        $image = $this->getSubject();

        if ($image && ($webPath = $image->getWebPath())) {

            $container = $this->getConfigurationPool()->getContainer();

            $fullPath = $container->getParameter('upload_image_prefix') . '/models/' . $webPath;

            return '<img src="' . $fullPath . '" class="admin-preview" alt="Picture don\'t exists"/>';
        }

        return $image->getWebPath();
    }
}