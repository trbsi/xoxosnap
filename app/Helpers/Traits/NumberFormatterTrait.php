<?php

namespace App\Helpers\Traits;

trait NumberFormatterTrait
{
    public static function formatNumber($n, $precision = 0)
    {
        if ($n < 1000) {
            // Anything less than a million
            $n_format = number_format($n);
        } elseif ($n < 1000000) {
            $n_format = number_format($n / 1000, $precision) . 'K';
        } elseif ($n < 1000000000) {
            // Anything less than a billion
            $n_format = number_format($n / 1000000, $precision) . 'M';
        } else {
            // At least a billion
            $n_format = number_format($n / 1000000000, $precision) . 'B';
        }

        return $n_format;
    }
}
    