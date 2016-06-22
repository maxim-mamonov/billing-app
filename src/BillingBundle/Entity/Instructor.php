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
 * @ORM\HasLifecycleCallbacks
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

    use PersonTrait;
    use ContactTrait;
    use LifecycleDateTimeTrait;

    /**
     * @var array<TrainingInstructor>
     *
     * @ORM\OneToMany(targetEntity="BillingBundle\Entity\InstructorTraining", mappedBy="instructor")
     */
    private $instructorTrainings;

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
        $this->instructorTrainings = new ArrayCollection();
    }

    /**
     * Add instructorTrainings
     *
     * @param \BillingBundle\Entity\InstructorTraining $instructorTrainings
     * @return Instructor
     */
    public function addInstructorTraining(InstructorTraining $instructorTrainings)
    {
        $this->instructorTrainings[] = $instructorTrainings;

        return $this;
    }

    /**
     * Remove instructorTrainings
     *
     * @param \BillingBundle\Entity\InstructorTraining $instructorTrainings
     */
    public function removeInstructorTraining(InstructorTraining $instructorTrainings)
    {
        $this->instructorTrainings->removeElement($instructorTrainings);
    }

    /**
     * Get instructorTrainings
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getInstructorTrainings()
    {
        return $this->instructorTrainings;
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
}
