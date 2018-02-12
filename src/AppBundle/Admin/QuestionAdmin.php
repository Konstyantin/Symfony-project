<?php
/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 12.02.18
 * Time: 21:38
 */

namespace AppBundle\Admin;

use AppBundle\Entity\Question;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * Class QuestionAdmin
 * @package AppBundle\Admin
 */
class QuestionAdmin extends AbstractAdmin
{
    /**
     * Count month in year
     */
    const MONTH_COUNT = 12;

    /**
     * Min hours work service
     */
    const MIN_HOURS = 9;

    /**
     * Max hour work service
     */
    const MAX_HOURS = 20;

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
                'label' => 'Full name',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Full name'
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
                'label' => 'Phone',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Phone'
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
                'label' => 'Email',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Email'
                ],
                'constraints' => [
                    new NotBlank(),
                    new Email()
                ]
            ])
            ->add('subject', TextType::class, [
                'label' => 'Subject',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Subject'
                ],
                'constraints' => [
                    new NotBlank(),
                    new Length([
                        'min' => 3
                    ])
                ]
            ])
            ->add('body', TextareaType::class, [
                'label' => 'Body',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Body',
                    'rows' => 7,
                    'class' => 'question-body-textarea'
                ],
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('date', DateTimeType::class, [
                'placeholder' => [
                    'year' => 'Year', 'month' => 'Month', 'day' => 'Day',
                    'hour' => 'Hour', 'minute' => 'Minute', 'second' => 'Second',
                ],
                'required' => false,
                'input' => 'timestamp',
                'years' => range(date("Y"), date("Y")),
                'months' => range(date("M", strtotime('-1 month')), self::MONTH_COUNT),
                'hours' => range(self::MIN_HOURS, self::MAX_HOURS),
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
            ->add('fullName', null, ['label' => 'Full name'])
            ->add('phone', null, ['label' => 'Phone'])
            ->add('email', null, ['label' => 'Email'])
            ->add('subject', null, ['label' => 'Subject'])
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
            ->addIdentifier('fullName', null, ['label' => 'Full name'])
            ->addIdentifier('phone', null, ['label' => 'Phone', 'row_align' => 'left'])
            ->addIdentifier('email', null, ['label' => 'Email'])
            ->addIdentifier('subject', null, ['label' => 'Subject'])
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