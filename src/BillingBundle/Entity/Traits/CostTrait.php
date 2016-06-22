<?php

namespace BillingBundle\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;

trait CostTrait
{
    /**
     * @var float
     *
     * @ORM\Column(name="cost", type="float")
     */
    protected $cost;

    /**
     * Get cost
     *
     * @return float
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * Set cost
     *
     * @param float $cost
     * @return $this
     */
    public function setCost($cost)
    {
        $this->cost = $cost;

        return $this;
    }
}
