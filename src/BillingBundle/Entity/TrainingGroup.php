<?php

namespace BillingBundle\Entity;

use BillingBundle\Entity\Traits\LifecycleDateTimeTrait;
use BillingBundle\Entity\Traits\TitleTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * TrainingGroup
 *
 * @ORM\Table(name="training_group")
 * @ORM\Entity(repositoryClass="BillingBundle\Repository\TrainingGroupRepository")
 */
class TrainingGroup
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
    use LifecycleDateTimeTrait;

    /**
     * @var Instructor
     *
     * @ORM\ManyToOne(targetEntity="BillingBundle\Entity\Instructor")
     * @ORM\JoinColumn(name="instructor_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $instructor;

    /**
     * @var Service
     *
     * @ORM\ManyToOne(targetEntity="BillingBundle\Entity\Service")
     * @ORM\JoinColumn(name="service_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $service;

    /**
     * @var array<Client>
     *
     * @ORM\ManyToMany(targetEntity="BillingBundle\Entity\Client", mappedBy="trainingGroups")
     */
    private $clients;

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
     * Constructor
     */
    public function __construct()
    {
        $this->clients = new ArrayCollection();
    }

    /**
     * Set instructor
     *
     * @param \BillingBundle\Entity\Instructor $instructor
     * @return TrainingGroup
     */
    public function setInstructor(Instructor $instructor = null)
    {
        $this->instructor = $instructor;

        return $this;
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
     * Add clients
     *
     * @param \BillingBundle\Entity\Client $clients
     * @return TrainingGroup
     */
    public function addClient(Client $clients)
    {
        $this->clients[] = $clients;

        return $this;
    }

    /**
     * Remove clients
     *
     * @param \BillingBundle\Entity\Client $clients
     */
    public function removeClient(Client $clients)
    {
        $this->clients->removeElement($clients);
    }

    /**
     * Get clients
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getClients()
    {
        return $this->clients;
    }

    /**
     * Set service
     *
     * @param \BillingBundle\Entity\Service $service
     * @return TrainingGroup
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
}
