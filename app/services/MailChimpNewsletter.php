<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;


class MailChimpNewsletter implements Newsletter
{

    public function __construct(protected ApiClient $client)
    {
        //
    }

    public function subscribed(string $email, string $list = null)
    {
        $list ??= config('services.mailchimp.lists.subscriber');

        return $this->client->lists->addListMember($list, [
            "email_address" => $email,
            'status' => 'subscribed'
        ]);
    }

}
