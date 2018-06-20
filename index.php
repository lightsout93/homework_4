<?php
//require('TariffBasic.php');
//require('TariffHourly.php');
//require('TariffDayli.php');
require('TariffStudent.php');

//new \App\TariffBasic(10, 10, 20, 'gps');
//new \App\TariffHourly(10, 10, 20, 'driver');
//new \App\TariffDayli(10, 10, 30, 'driver');
new \App\TariffStudent(10, 10, 25, 'gps');