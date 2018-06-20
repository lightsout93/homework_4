<?php

namespace App;
require('TariffAbstract.php');
require('GPS.php');
require('Driver.php');

class TariffHourly extends TariffAbstract
{
    use GPS, Driver;

    public function __construct($distance, $time, $age, $service)
    {
        parent::__construct($distance, $time, $age, $service);
        $this->addService();
        echo $this->tariffCalculation();
    }

    private function addService()
    {
        if ($this->service == 'gps') {
            return $this->addGPS($this->time);
        } elseif ($this->service == 'driver') {
            return $this->addDriver();
        } else {
            return null;
        }
    }

    public function tariffCalculation()
    {
        if ($this->compareAge()) {
            $this->time = ceil($this->time / 60);
            $this->resultCost = ($this->time * 200 * 60) * $this->compareAge() + $this->addService();
            return $this->resultCost;
        }
        return 'Вам меньше 18 лет, вы не можете водить автомобиль!';
    }
}
