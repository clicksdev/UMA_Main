<?php

namespace App\Traits;

use App\Models\Settings;
use Illuminate\Support\Facades\Http;

trait Notification
{
    private string $url = 'https://fcm.googleapis.com/fcm/send';

    public function sendNotification($receivers = [], $title = '', $message = '')
    {
        $server_key = env('FCM_SERVER_KEY');
        $fields = [
            'registration_ids' => $receivers,
            "notification" => [
                "title" => $title,
                "body"  => $message,
            ],
        ];

        $headers = [
            'Authorization' => 'key=' . $server_key,
            'Content-Type' => 'application/json'
        ];

        $response = Http::withHeaders($headers)->post($this->url, $fields);
        $response = $response->body();

        info('NOTIFICATION LOG REQUEST', [$fields, $headers]);
        info('NOTIFICATION LOG RESPONSE', [$response]);
        return $response;
    }
}
