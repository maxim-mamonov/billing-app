<?php

namespace BillingBundle\Entity;

use BillingBundle\Entity\Traits\ContactTrait;
use BillingBundle\Entity\Traits\LifecycleDateTimeTrait;
use BillingBundle\Entity\Traits\PersonTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * FamilyMember
 *
 * @ORM\Table(name="family_member")
 * @ORM\Entity(repositoryClass="BillingBundle\Repository\FamilyMemberRepository")
 */
class FamilyMember
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
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    use ContactTrait;
    use PersonTrait;
    use LifecycleDateTimeTrait;

    /**
     * @var string
     *
     * @ORM\Column(name="job", type="string", length=255, nullable=true)
     */
    private $job;

    /**
     * @var array<Client>
     *
     * @ORM\ManyToMany(targetEntity="BillingBundle\Entity\Client", mappedBy="familyMembers")
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
     * Set type
     *
     * @param string $type
     * @return FamilyMember
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }


    /**
     * Set job
     *
     * @param string $job
     * @return FamilyMember
     */
    public function setJob($job)
    {
        $this->job = $job;

        return $this;
    }

    /**
     * Get job
     *
     * @return string
     */
    public function getJob()
    {
        return $this->job;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->clients = new ArrayCollection();
    }

    /**
     * Add clients
     *
     * @param \BillingBundle\Entity\Client $clients
     * @return FamilyMember
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
}
