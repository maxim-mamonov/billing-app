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
     * @var InstructorTraining[]
     *
     * @ORM\OneToMany(
     *     targetEntity="BillingBundle\Entity\InstructorTraining",
     *     mappedBy="instructor"
     * )
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
     * @param \BillingBundle\Entity\InstructorTraining $instructorTraining
     * @return Instructor
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
     * Get full client name
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getFullName();
    }
}
