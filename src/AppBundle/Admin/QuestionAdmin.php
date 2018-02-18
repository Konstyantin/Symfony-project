<?php
/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 12.02.18
 * Time: 21:38
 */

namespace AppBundle\Admin;

use AppBundle\Entity\Question;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use AppBundle\Constants\RegistrationService;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

/**
 * Class QuestionAdmin
 * @package AppBundle\Admin
 */
class QuestionAdmin extends AbstractAdmin
{
    /**
     * @var string $translationDomain
     */
    protected $translationDomain = 'SonataQuestionBundle';

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
            ->add('fullName', TextType::class, [
                'label' => 'form.label.fullName',
                'translation_domain' => 'SonataQuestionBundle',
                'required' => false,
                'attr' => [
                    'placeholder' => 'form.placeholder.fullName'
                ],
                'constraints' => [
                    new NotBlank(),
                    new Length([
                        'min' => 5,
                        'max' => 40
                    ])
                ]
             ])
            ->add('phone', TextType::class, [
                'label' => 'form.label.phone',
                'translation_domain' => 'SonataQuestionBundle',
                'required' => false,
                'attr' => [
                    'placeholder' => 'form.placeholder.phone'
                ],
                'constraints' => [
                    new NotBlank(),
                    new Length([
                        'min' => 9,
                        'max' => 13
                    ])
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'form.label.email',
                'translation_domain' => 'SonataQuestionBundle',
                'required' => false,
                'attr' => [
                    'placeholder' => 'form.placeholder.email'
                ],
                'constraints' => [
                    new NotBlank(),
                    new Email()
                ]
            ])
            ->add('subject', TextType::class, [
                'label' => 'form.label.subject',
                'translation_domain' => 'SonataQuestionBundle',
                'required' => false,
                'attr' => [
                    'placeholder' => 'form.placeholder.subject'
                ],
                'constraints' => [
                    new NotBlank(),
                    new Length([
                        'min' => 3
                    ])
                ]
            ])
            ->add('body', TextareaType::class, [
                'label' => 'form.label.body',
                'translation_domain' => 'SonataQuestionBundle',
                'required' => false,
                'attr' => [
                    'placeholder' => 'form.placeholder.body',
                    'rows' => 7,
                    'class' => 'question-body-textarea'
                ],
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('date', DateTimeType::class, [
                'label' => 'Date',
                'translation_domain' => 'SonataQuestionBundle',
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
    public function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter
            ->add('fullName', null, ['label' => 'datagrid.filter.fullName'])
            ->add('phone', null, ['label' => 'datagrid.filter.phone'])
            ->add('email', null, ['label' => 'datagrid.filter.email'])
            ->add('subject', null, ['label' => 'datagrid.filter.subject'])
        ;
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
            ->addIdentifier('fullName', null, ['label' => 'datagrid.list.fullName'])
            ->addIdentifier('phone', null, ['label' => 'datagrid.list.phone', 'row_align' => 'left'])
            ->addIdentifier('email', null, ['label' => 'datagrid.list.email'])
            ->addIdentifier('subject', null, ['label' => 'datagrid.list.subject'])
            ->add('_action',null, [
                'actions' => [
                    'delete' => [],
                    'edit' => []
                ],
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
        if ($object instanceof Question) {
            return $object->getSubject();
        }

        return 'Question';
    }

}