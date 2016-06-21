<?php

namespace BillingBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class ClientAdmin extends AbstractAdmin
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
            ->add('gender')
            ->add('birthday', 'doctrine_orm_date_range', array(
                'field_type' => 'sonata_type_date_range_picker',
            ))
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
            ->add('gender')
            ->add('birthday')
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
            ->add('firstName')
            ->add('lastName')
            ->add('patronymic')
            ->add('gender')
            ->add('birthday', 'Sonata\CoreBundle\Form\Type\DatePickerType');
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
            ->add('gender')
            ->add('birthday')
            ->add('createdAt')
            ->add('updatedAt');
    }
}
