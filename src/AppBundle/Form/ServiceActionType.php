<?php

namespace AppBundle\Form;

use AppBundle\Entity\ServiceAction;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class ServiceActionType
 * @package AppBundle\Form
 */
class ServiceActionType extends AbstractType
{
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
        $builder
            ->add('action', TextType::class, [
                'label' => 'Action',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Action'
                ]
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Description'
                ]
            ]);
    }

    /**
     * Configuration options
     *
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ServiceAction::class
        ]);
    }

    /**
     * Get block prefix
     *
     * @return string
     */
    public function getBlockPrefix()
    {
        return 'app_bundle_service_action_type';
    }
}
