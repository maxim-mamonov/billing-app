<?php

namespace BillingBundle\Entity;

use BillingBundle\Entity\Traits\ContactTrait;
use BillingBundle\Entity\Traits\LifecycleDateTimeTrait;
use BillingBundle\Entity\Traits\PersonTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Instructor
 *
 * @ORM\Table(name="instructor")
 * @ORM\Entity(repositoryClass="BillingBundle\Repository\InstructorRepository")
 */
class Instructor
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    use ContactTrait;
    use PersonTrait;
    use LifecycleDateTimeTrait;

    /**
     * @var array<TrainingInstructor>
     *
     * @ORM\OneToMany(targetEntity="BillingBundle\Entity\TrainingInstructor", mappedBy="instructor")
     */
    private $trainingInstructors;

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
        $this->trainingInstructors = new ArrayCollection();
    }

    /**
     * Add trainingInstructors
     *
     * @param \BillingBundle\Entity\TrainingInstructor $trainingInstructors
     * @return Instructor
     */
    public function addTrainingInstructor(TrainingInstructor $trainingInstructors)
    {
        $this->trainingInstructors[] = $trainingInstructors;

        return $this;
    }

    /**
     * Remove trainingInstructors
     *
     * @param \BillingBundle\Entity\TrainingInstructor $trainingInstructors
     */
    public function removeTrainingInstructor(TrainingInstructor $trainingInstructors)
    {
        $this->trainingInstructors->removeElement($trainingInstructors);
    }

    /**
     * Get trainingInstructors
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTrainingInstructors()
    {
        return $this->trainingInstructors;
    }
}
