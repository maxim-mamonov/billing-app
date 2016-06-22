<?php

namespace BillingBundle\Entity;

use BillingBundle\Entity\Traits\ContactTrait;
use BillingBundle\Entity\Traits\LifecycleDateTimeTrait;
use BillingBundle\Entity\Traits\PersonTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Client
 *
 * @ORM\Table(name="client")
 * @ORM\Entity(repositoryClass="BillingBundle\Repository\ClientRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Client
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    use PersonTrait;
    use ContactTrait;
    use LifecycleDateTimeTrait;

    /**
     * @var array<TrainingGroup>
     *
     * @ORM\ManyToMany(targetEntity="BillingBundle\Entity\TrainingGroup", inversedBy="clients")
     * @ORM\JoinTable(name="client_training_group")
     */
    private $trainingGroups;

    /**
     * @var array<ClientPlan>
     *
     * @ORM\OneToMany(targetEntity="BillingBundle\Entity\ClientPlan",
     *     mappedBy="client",
     *     cascade={"all"},
     *     orphanRemoval=true
     * )
     */
    private $clientPlans;

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
        $this->trainingGroups = new ArrayCollection();
        $this->clientPlans = new ArrayCollection();
    }

    /**
     * Add trainingGroups
     *
     * @param \BillingBundle\Entity\TrainingGroup $trainingGroups
     * @return Client
     */
    public function addTrainingGroup(TrainingGroup $trainingGroups)
    {
        $this->trainingGroups[] = $trainingGroups;

        return $this;
    }

    /**
     * Remove trainingGroups
     *
     * @param \BillingBundle\Entity\TrainingGroup $trainingGroups
     */
    public function removeTrainingGroup(TrainingGroup $trainingGroups)
    {
        $this->trainingGroups->removeElement($trainingGroups);
    }

    /**
     * Get trainingGroups
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTrainingGroups()
    {
        return $this->trainingGroups;
    }

    /**
     * Get full client name
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getFullName();
    }

    /**
     * Add clientPlans
     *
     * @param \BillingBundle\Entity\ClientPlan $clientPlans
     * @return Client
     */
    public function addClientPlan(ClientPlan $clientPlans)
    {
        if ($clientPlans) {
            $clientPlans->setClient($this);
        }
        $this->clientPlans[] = $clientPlans;

        return $this;
    }

    /**
     * Remove clientPlans
     *
     * @param \BillingBundle\Entity\ClientPlan $clientPlans
     */
    public function removeClientPlan(ClientPlan $clientPlans)
    {
        $this->clientPlans->removeElement($clientPlans);
    }

    /**
     * Get clientPlans
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getClientPlans()
    {
        return $this->clientPlans;
    }
}
