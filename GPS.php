<?php

namespace App;


trait GPS
{
    public function addGPS($time)
    {
       return ceil($time/60)*15;
    }
}