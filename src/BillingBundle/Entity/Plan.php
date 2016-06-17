<?php

namespace BillingBundle\Entity;

use BillingBundle\Entity\Traits\AmountTrait;
use BillingBundle\Entity\Traits\LifecycleDateTimeTrait;
use BillingBundle\Entity\Traits\TitleTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Plan
 *
 * @ORM\Table(name="plan")
 * @ORM\Entity(repositoryClass="BillingBundle\Repository\PlanRepository")
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
    use AmountTrait;

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
}
