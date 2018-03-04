<?php

namespace CarBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class ModelSearchType
 * @package CarBundle\Form
 */
class ModelSearchType extends AbstractType
{
    /**
     * Build form
     *
     * Define form field and set attributes for each form field
     *
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'translation_domain' => 'BodyType',
                'label' => 'Name',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Model name',
                    'class' => 'model-name-field'
                ]
            ])
            ->add('search', SubmitType::class, [
                'label' => 'Search',
                'attr' => [
                    'class' => 'btn btn-search-model'
                ]
            ])
        ;
    }

    /**
     * Configuration options
     *
     * Set configuration params for current form
     *
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'CarBundle\Entity\Model',
            'action' => 'api/models',
            'attr' => [
                'class' => 'search-model'
            ]
        ]);
    }

    /**
     * Get block prefix
     *
     * @return string
     */
    public function getBlockPrefix()
    {
        return 'car_bundle_model_search_type';
    }
}
