<?php

namespace BillingBundle\Admin;

use BillingBundle\DBAL\Types\EnumGenderType;
use Knp\Menu\ItemInterface as MenuItemInterface;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Admin\AdminInterface;
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
        unset($this->listModes['mosaic']);

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
            ->with('client.form.tab.personal', array('class' => 'col-md-6'))
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
            ->end()
            ->with('client.form.tab.contact', array('class' => 'col-md-6'))
                ->add('phone')
                ->add('email')
                ->add('address')
                ->add('contactDetails')
            ->end();
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

    protected function configureTabMenu(MenuItemInterface $menu, $action, AdminInterface $childAdmin = null)
    {
        if (!$childAdmin && !in_array($action, array('edit', 'show'))) {
            return;
        }

        $admin = $this->isChild() ? $this->getParent() : $this;
        $id = $admin->getRequest()->get('id');

        $menu->addChild(
            'client.form.tab.general',
            $admin->generateMenuUrl('show', array('id' => $id))
        );

        $menu->addChild(
            'client.form.tab.plans',
            $admin->generateMenuUrl('billing.admin.client_plan.list', array('id' => $id))
        );
    }
}
