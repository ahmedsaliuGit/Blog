<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;

class MailchimpNewsletter implements Newsletter {
    private $client;

    public function __construct(ApiClient $client)
    {
        $this->client = $client;
    }

    public function subscribe(string $email, string $list = null) {
        $list = $list ?: config('services.mailchimp.lists.subscriber');

        return $this->client->lists->addListMember($list, [
            "email_address" => $email,
            "status" => "subscribed",
        ]);
    }
}