<?php

namespace BillingBundle\Entity;

use BillingBundle\Entity\Traits\AmountTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * TrainingInstructor
 *
 * @ORM\Table(name="training_instructor")
 * @ORM\Entity(repositoryClass="BillingBundle\Repository\TrainingInstructorRepository")
 */
class TrainingInstructor
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    use AmountTrait;

    /**
     * @var Training
     *
     * @ORM\ManyToOne(targetEntity="BillingBundle\Entity\Training", inversedBy="trainingInstructors")
     * @ORM\JoinColumn(name="training_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $training;

    /**
     * @var Instructor
     *
     * @ORM\ManyToOne(targetEntity="BillingBundle\Entity\Instructor", inversedBy="trainingInstructors")
     * @ORM\JoinColumn(name="instructor_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $instructor;

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
     * Get training
     *
     * @return \BillingBundle\Entity\Training
     */
    public function getTraining()
    {
        return $this->training;
    }

    /**
     * Set training
     *
     * @param \BillingBundle\Entity\Training $training
     * @return TrainingInstructor
     */
    public function setTraining(Training $training = null)
    {
        $this->training = $training;

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
     * Set instructor
     *
     * @param \BillingBundle\Entity\Instructor $instructor
     * @return TrainingInstructor
     */
    public function setInstructor(Instructor $instructor = null)
    {
        $this->instructor = $instructor;

        return $this;
    }
}
