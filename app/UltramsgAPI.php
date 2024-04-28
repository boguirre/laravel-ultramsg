<?php

namespace App;

use Illuminate\Support\Facades\Http;

class UltramsgAPI
{
    protected $token;
    protected $baseUrl;

    public function __construct()
    {
        $this->token = env('ULTRAMSG_TOKEN');
        $this->baseUrl = env('ULTRAMSG_URL');
    }

    public function sendMessages(array $numbers, $message)
    {
        $responses = [];
        foreach ($numbers as $number) {
            $response = Http::post($this->baseUrl, [
                'token' => $this->token,
                'to' => $number,
                'body' => $message,
                'priority' => 10,
                'referenceId' => '',
            ]);

            $responses[$number] = $response->json();
        }

        return $responses;
    }

    public function getMessageStatus($messageId)
    {
        $response = Http::get($this->baseUrl . '/status', [
            'token' => $this->token,
            'message_id' => $messageId
        ]);

        return $response->json();
    }
}
