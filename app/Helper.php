<?php
// Example with namespace
// app/CustomHelper.php
namespace App;

use Illuminate\Support\Facades\Http;

if (!function_exists('addContactToZapier')) {
    function addContactToZapier($payload)
    {
        $zapierWebhookUrl = env('ZAPIER_WEBHOOK');

        // Send POST request to Zapier webhook
        Http::post($zapierWebhookUrl, [
            'json' => ['contact' => $payload],
        ]);
    }
}
?>
