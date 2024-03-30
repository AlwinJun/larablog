<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;


class NewsLetter
{

    public function subscribed(string $email, string $list = null)
    {
        $list ??= config('services.mailchimp.lists.subscriber');

        return $this->client()->lists->addListMember($list, [
            "email_address" => $email,
            'status' => 'subscribed'
        ]);
    }

    private function client()
    {
        $client = new ApiClient();

        return $client->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us22'
        ]);

    }

}