<?php

namespace BillingBundle\Entity;

use BillingBundle\Entity\Traits\CostTrait;
use BillingBundle\Entity\Traits\LifecycleDateTimeTrait;
use BillingBundle\Entity\Traits\TitleTrait;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Plan
 *
 * @ORM\Table(name="plan")
 * @ORM\Entity(repositoryClass="BillingBundle\Repository\PlanRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Plan
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    use TitleTrait;

    /**
     * @var Service
     *
     * @ORM\ManyToOne(targetEntity="BillingBundle\Entity\Service")
     * @ORM\JoinColumn(name="service_id", referencedColumnName="id", onDelete="CASCADE", nullable=false)
     * @Assert\NotBlank(message="Service is required")
     */
    private $service;

    use CostTrait;

    /**
     * @var int
     *
     * @ORM\Column(name="trainings", type="smallint")
     */
    private $trainings;

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
     * Set trainings
     *
     * @param integer $trainings
     * @return Plan
     */
    public function setTrainings($trainings)
    {
        $this->trainings = $trainings;

        return $this;
    }

    /**
     * Get trainings
     *
     * @return integer
     */
    public function getTrainings()
    {
        return $this->trainings;
    }

    /**
     * Set service
     *
     * @param \BillingBundle\Entity\Service $service
     * @return Plan
     */
    public function setService(Service $service = null)
    {
        $this->service = $service;

        return $this;
    }

    /**
     * Get service
     *
     * @return \BillingBundle\Entity\Service
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getService()->getName() . ' - ' . $this->getName();
    }
}
