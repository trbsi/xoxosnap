<?php

namespace App\Web\Home\Repositores\Home;

use Cookie;

class Above18Repository 
{
    public function getJavascriptParam(): ?string
    {
        $javascript = null;

        if(empty(Cookie::get('above_18'))) {
            Cookie::queue(Cookie::make('above_18', true, time() + 60 * 60 * 24 * 365));//1year
            $javascript = sprintf("
                Swal.fire({
                  type: 'question',
                  title: '%s',
                  html: '%s',
                  allowOutsideClick: false
                })",
                __('web/home/home.over_18'),
                __('web/home/home.accept_that_you_are_over_18')
            );          
        }

        return $javascript;
    }
}
