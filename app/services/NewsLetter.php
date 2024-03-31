<?php

namespace App\Services;

interface Newsletter
{
    public function subscribed(string $email, string $list = null);
}