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
            $result = floor($n / 1000);
            $n_format = number_format($result, $precision) . 'K';
        } elseif ($n < 1000000000) {
            // Anything less than a billion
            $result = floor($n / 1000000);
            $n_format = number_format($result, $precision) . 'M';
        } else {
            // At least a billion
            $result = floor($n / 1000000000);
            $n_format = number_format($result, $precision) . 'B';
        }

        return $n_format;
    }
}
    