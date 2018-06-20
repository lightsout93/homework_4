<?php

namespace App;
require('TariffAbstract.php');
require('GPS.php');

class TariffStudent extends TariffAbstract
{
    use GPS;

    public function __construct($distance, $time, $age, $service)
    {
        parent::__construct($distance, $time, $age, $service);
        $this->addService();
        echo $this->tariffCalculation();
    }

    public function tariffCalculation()
    {
        if ($this->age > 25){
            return 'Вы не можете использовать этот тариф, вам больше 25 лет!';
        }
        if ($this->compareAge()) {
            $resultCost = ($this->distance * 4 + $this->time) * $this->compareAge()+$this->addService();
            return $resultCost;
        }
        return 'Вам меньше 18 лет, вы не можете водить автомобиль!';
    }

    private function addService()
    {
        if ($this->service == 'gps') {
            return $this->addGPS($this->time);
        } else {
            return null;
        }
    }
}