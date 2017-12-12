<?php

namespace CarBundle\Form;

use CarBundle\Entity\Car;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Vich\UploaderBundle\Form\Type\VichImageType;
use CarBundle\Form\DataTransformer\GalleryToMediaTransformer;

/**
 * Class FeatureType
 * @package CarBundle\Form
 */
class FeatureType extends AbstractType
{
    /**
     * @var GalleryToMediaTransformer $transformer
     */
    private $transformer;

    /**
     * FeatureType constructor.
     * @param GalleryToMediaTransformer $transformer
     */
    public function __construct(GalleryToMediaTransformer $transformer)
    {
        $this->transformer = $transformer;
    }

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
            ->add('short_description', TextType::class, [
                'label' => 'Short Description',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Short Description'
                ],
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('full_description', TextareaType::class, [
                'label' => 'Full Description',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Full Description'
                ],
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('car', EntityType::class, [
                'label' => false,
                'class' => Car::class,
                'attr' => [
                    'style' => 'display: none'
                ]
            ])
            ->add('imageFile', VichImageType::class, [])
            ->add('image', 'sonata_media_type', [
                'provider' => 'sonata.media.provider.image',
                'context'  => 'default'
            ])
        ;

        $builder->get('image')->addModelTransformer($this->transformer);
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
            'data_class' => 'CarBundle\Entity\Feature'
        ]);
    }

    /**
     * Get block prefix
     *
     * @return string
     */
    public function getBlockPrefix()
    {
        return 'car_bundle_feature_type';
    }
}
