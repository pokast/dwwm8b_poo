<?php
namespace App\Trait;

    trait changeTimeZone
    {
        public function changeTimeZone($timeZone) : void
        {
            date_default_timezone_set($timeZone);
        }

    }