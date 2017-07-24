<?php
namespace App\Facades;

class Date{
    public static function _($format = 'd.m.Y', $date = false) {
        if (!$date) {
            $date = time();
        }

        if (!is_numeric($date)) {
            $date = strtotime($date);
        }

        $format = date($format, $date);

        if (strstr($format, '#N')) {
          /* TODO */
        }

        if (strstr($format, '#M')) {
            /* TODO */
        }

        if (strstr($format, '#m')) {
            /* TODO */
        }

        if (strstr($format, '#R')) {
            /* TODO */
        }

        return $format;

    }
}