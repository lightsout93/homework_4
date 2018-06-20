<?php

namespace App;

abstract class TariffAbstract
{
    protected $distance;
    protected $time;
    protected $age;
    protected $service;
    protected $resultCost;

    public function __construct($distance, $time, $age, $service)
    {
        $this->distance = $distance;
        $this->time = $time;
        $this->age = $age;
        $this->service = $service;
    }

    public function compareAge()
    {
        if ($this->age < 18) {
            return false;
        } elseif ($this->age >= 18 and $this->age <= 21) {
            return 1.1;
        } else {
            return 1;
        }
    }

    abstract public function tariffCalculation();
}
