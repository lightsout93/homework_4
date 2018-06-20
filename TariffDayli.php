<?php

namespace App;
require('TariffAbstract.php');
require('GPS.php');
require('Driver.php');

class TariffDayli extends TariffAbstract
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
        $timeMod = ($this->time - 24 * 60) % (24 * 60);
        if ($timeMod <= 30 and $timeMod >= 0) {
            $this->time = $this->time - $timeMod;
        } elseif ($timeMod > 30 or $timeMod < 0) {
            $this->time = ceil($this->time / (24 * 60)) * 24 * 60;
        }
        if ($this->compareAge()) {
            $this->resultCost = ($this->distance + $this->time * 1000 / (24 * 60)) * $this->compareAge() + $this->addService();
            return $this->resultCost;
        }
        return 'Вам меньше 18 лет, вы не можете водить автомобиль!';
    }
}