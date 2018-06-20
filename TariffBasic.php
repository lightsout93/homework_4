<?php

namespace App;
require('TariffAbstract.php');
require('GPS.php');

class TariffBasic extends TariffAbstract
{
    use GPS;

    public function __construct($distance, $time, $age, $service)
    {
        parent::__construct($distance, $time, $age, $service);
        echo $this->tariffCalculation();
    }

    public function tariffCalculation()
    {
        if ($this->compareAge()) {
            $this->resultCost = ($this->distance * 10 + $this->time * 3) * $this->compareAge() + $this->addService();
            return $this->resultCost;
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
