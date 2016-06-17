<?php

namespace BillingBundle\Entity;

use BillingBundle\Entity\Traits\LifecycleDateTimeTrait;
use BillingBundle\Entity\Traits\PersonTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Client
 *
 * @ORM\Table(name="client")
 * @ORM\Entity(repositoryClass="BillingBundle\Repository\ClientRepository")
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
    use LifecycleDateTimeTrait;

    /**
     * @var array<FamilyMember>
     *
     * @ORM\ManyToMany(targetEntity="BillingBundle\Entity\FamilyMember", inversedBy="clients")
     * @ORM\JoinTable(name="client_family_member")
     */
    private $familyMembers;

    /**
     * @var array<TrainingGroup>
     *
     * @ORM\ManyToMany(targetEntity="BillingBundle\Entity\TrainingGroup", inversedBy="clients")
     * @ORM\JoinTable(name="client_training_group")
     */
    private $trainingGroups;

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
        $this->familyMembers = new ArrayCollection();
        $this->trainingGroups = new ArrayCollection();
    }

    /**
     * Add familyMembers
     *
     * @param \BillingBundle\Entity\FamilyMember $familyMembers
     * @return Client
     */
    public function addFamilyMember(FamilyMember $familyMembers)
    {
        $this->familyMembers[] = $familyMembers;

        return $this;
    }

    /**
     * Remove familyMembers
     *
     * @param \BillingBundle\Entity\FamilyMember $familyMembers
     */
    public function removeFamilyMember(FamilyMember $familyMembers)
    {
        $this->familyMembers->removeElement($familyMembers);
    }

    /**
     * Get familyMembers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFamilyMembers()
    {
        return $this->familyMembers;
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
}
