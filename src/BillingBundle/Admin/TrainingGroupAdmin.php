<?php

namespace BillingBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class TrainingGroupAdmin extends AbstractAdmin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('instructor')
            ->add('service')
            ->add('name')
            ->add('description')
            ->add('archived')
            ->add('createdAt');
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        unset($this->listModes['mosaic']);

        $listMapper
            ->add('id')
            ->add('instructor')
            ->add('service')
            ->add('name')
            ->add('clients')
            ->add('description')
            ->add('archived')
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
            ->add('service')
            ->add('instructor')
            ->add('name')
            ->add('description')
            ->add('clients', 'sonata_type_model', array(
                'expanded' => false,
                'by_reference' => false,
                'multiple' => true
            ))
            ->add('archived');
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('service')
            ->add('instructor')
            ->add('name')
            ->add('description')
            ->add('clients')
            ->add('archived')
            ->add('createdAt');
    }

    /**
     * {@inheritdoc}
     */
    public function getFilterParameters()
    {
        // build the values array
        if ($this->hasRequest()) {
            $reset = $this->request->query->get('filters') === 'reset';

            if (!$reset) {
                $this->datagridValues = array_merge(
                    array(
                        'archived' => array (
                            'value' => 2
                        ),
                    ),
                    $this->datagridValues
                );
            }
        }

        return parent::getFilterParameters();
    }
}
