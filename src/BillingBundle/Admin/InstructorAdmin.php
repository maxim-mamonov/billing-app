<?php

namespace BillingBundle\Admin;

use BillingBundle\DBAL\Types\EnumGenderType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class InstructorAdmin extends AbstractAdmin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('firstName')
            ->add('lastName')
            ->add('patronymic')
            ->add('gender', 'doctrine_orm_choice', array(
                'field_options' => array(
                    'choices' => array(
                        EnumGenderType::GENDER_MALE => 'gender.male',
                        EnumGenderType::GENDER_FEMALE => 'gender.female',
                    ),
                    'required' => false,
                    'multiple' => false,
                    'expanded' => false,
                ),
                'field_type' => 'choice',
            ))
            ->add('birthday', 'doctrine_orm_date_range', array(
                'field_type' => 'sonata_type_date_range_picker',
            ))
            ->add('phone')
            ->add('contactDetails')
            ->add('createdAt', 'doctrine_orm_date_range', array(
                'field_type' => 'sonata_type_date_range_picker',
            ))
            ->add('updatedAt', 'doctrine_orm_date_range', array(
                'field_type' => 'sonata_type_date_range_picker',
            ));
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->add('firstName')
            ->add('lastName')
            ->add('patronymic')
            ->add('gender', 'trans')
            ->add('birthday')
            ->add('phone')
            ->add('contactDetails')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('_action', null, array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ));
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('id')
            ->add('firstName')
            ->add('lastName')
            ->add('patronymic')
            ->add('gender', 'choice', array(
                'choices' => array(
                    EnumGenderType::GENDER_MALE => 'gender.male',
                    EnumGenderType::GENDER_FEMALE => 'gender.female',
                )
            ))
            ->add('birthday', 'Sonata\CoreBundle\Form\Type\DatePickerType')
            ->add('phone')
            ->add('email')
            ->add('address')
            ->add('contactDetails');
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('firstName')
            ->add('lastName')
            ->add('patronymic')
            ->add('gender', 'trans')
            ->add('birthday')
            ->add('phone')
            ->add('email')
            ->add('address')
            ->add('contactDetails')
            ->add('createdAt')
            ->add('updatedAt');
    }
}
