<?php

namespace BillingBundle\Entity;

use BillingBundle\Entity\Traits\CostTrait;
use BillingBundle\Entity\Traits\LifecycleDateTimeTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * ClientPlan
 *
 * @ORM\Table(name="client_plan")
 * @ORM\Entity(repositoryClass="BillingBundle\Repository\ClientPlanRepository")
 * @ORM\HasLifecycleCallbacks
 */
class ClientPlan
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var Client
     *
     * @ORM\ManyToOne(targetEntity="BillingBundle\Entity\Client", inversedBy="clientPlans", cascade={"persist"})
     * @ORM\JoinColumn(name="client_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $client;

    /**
     * @var Plan
     *
     * @ORM\ManyToOne(targetEntity="BillingBundle\Entity\Plan")
     * @ORM\JoinColumn(name="plan_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $plan;

    use CostTrait;
    use LifecycleDateTimeTrait;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set client
     *
     * @param \BillingBundle\Entity\Client $client
     * @return ClientPlan
     */
    public function setClient(Client $client = null)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \BillingBundle\Entity\Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set plan
     *
     * @param \BillingBundle\Entity\Plan $plan
     * @return ClientPlan
     */
    public function setPlan(Plan $plan = null)
    {
        $this->plan = $plan;

        return $this;
    }

    /**
     * Get plan
     *
     * @return \BillingBundle\Entity\Plan
     */
    public function getPlan()
    {
        return $this->plan;
    }

    /**
     * Update properties
     *
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function updateProperties()
    {
        $this->setCost($this->getPlan()->getCost());
    }
}
