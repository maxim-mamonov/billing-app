<?php

namespace BillingBundle\Entity;

use BillingBundle\Entity\Traits\CostTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Rate
 *
 * @ORM\Table(name="rate")
 * @ORM\Entity(repositoryClass="BillingBundle\Repository\RateRepository")
 */
class Rate
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
     * @var Instructor
     *
     * @ORM\ManyToOne(
     *     targetEntity="BillingBundle\Entity\Instructor"
     * )
     * @ORM\JoinColumn(
     *     name="instructor_id",
     *     referencedColumnName="id",
     *     onDelete="CASCADE"
     * )
     */
    private $instructor;

    /**
     * @var Service
     *
     * @ORM\ManyToOne(
     *     targetEntity="BillingBundle\Entity\Service"
     * )
     * @ORM\JoinColumn(
     *     name="service_id",
     *     referencedColumnName="id",
     *     onDelete="CASCADE"
     * )
     */
    private $service;

    use CostTrait;

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
     * Get instructor
     *
     * @return \BillingBundle\Entity\Instructor
     */
    public function getInstructor()
    {
        return $this->instructor;
    }

    /**
     * Set instructor
     *
     * @param \BillingBundle\Entity\Instructor $instructor
     * @return Rate
     */
    public function setInstructor(Instructor $instructor = null)
    {
        $this->instructor = $instructor;

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
     * Set service
     *
     * @param \BillingBundle\Entity\Service $service
     * @return Rate
     */
    public function setService(Service $service = null)
    {
        $this->service = $service;

        return $this;
    }
}
