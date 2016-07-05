<?php

namespace BillingBundle\Entity;

use BillingBundle\Entity\Traits\LifecycleDateTimeTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Training
 *
 * @ORM\Table(name="training")
 * @ORM\Entity(repositoryClass="BillingBundle\Repository\TrainingRepository")
 */
class Training
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

    /**
     * @var InstructorTraining[]
     *
     * @ORM\OneToMany(
     *     targetEntity="BillingBundle\Entity\InstructorTraining",
     *     mappedBy="training"
     * )
     */
    private $instructorTrainings;

    /**
     * @var array<Client>
     *
     * @ORM\ManyToMany(
     *     targetEntity="BillingBundle\Entity\Client"
     * )
     * @ORM\JoinTable(
     *     name="client_training"
     * )
     */
    private $clients;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start", type="datetime")
     */
    private $start;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end", type="datetime")
     */
    private $end;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    use LifecycleDateTimeTrait;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->instructorTrainings = new ArrayCollection();
        $this->clients = new ArrayCollection();
    }

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
     * Set start
     *
     * @param \DateTime $start
     * @return Training
     */
    public function setStart($start)
    {
        $this->start = $start;

        return $this;
    }

    /**
     * Get start
     *
     * @return \DateTime
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Set end
     *
     * @param \DateTime $end
     * @return Training
     */
    public function setEnd($end)
    {
        $this->end = $end;

        return $this;
    }

    /**
     * Get end
     *
     * @return \DateTime
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Training
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set service
     *
     * @param \BillingBundle\Entity\Service $service
     * @return Training
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
     * Add instructorTrainings
     *
     * @param \BillingBundle\Entity\InstructorTraining $instructorTraining
     * @return Training
     */
    public function addInstructorTraining(InstructorTraining $instructorTraining)
    {
        $this->instructorTrainings[] = $instructorTraining;

        return $this;
    }

    /**
     * Remove instructorTrainings
     *
     * @param \BillingBundle\Entity\InstructorTraining $instructorTraining
     */
    public function removeInstructorTraining(InstructorTraining $instructorTraining)
    {
        $this->instructorTrainings->removeElement($instructorTraining);
    }

    /**
     * Get instructorTrainings
     *
     * @return InstructorTraining[]
     */
    public function getInstructorTrainings()
    {
        return $this->instructorTrainings;
    }

    /**
     * Add clients
     *
     * @param \BillingBundle\Entity\Client $client
     * @return Training
     */
    public function addClient(Client $client)
    {
        $this->clients[] = $client;

        return $this;
    }

    /**
     * Remove clients
     *
     * @param \BillingBundle\Entity\Client $client
     */
    public function removeClient(Client $client)
    {
        $this->clients->removeElement($client);
    }

    /**
     * Get clients
     *
     * @return Client[]
     */
    public function getClients()
    {
        return $this->clients;
    }
}
