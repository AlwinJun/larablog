<?php

namespace App\Services;


class ConvertKitNewsletter implements Newsletter
{
    public function subscribed(string $email, string $list = null)
    {
        //subcribe user win convertkit specific api
    }
}