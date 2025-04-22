<?php

namespace App\Services\FormatApi;

use App\Services\FormatApi\FormatApiDataInterface;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;

class FormatApiTwitter implements FormatApiDataInterface
{
    public function apiCall(string $apiLink): array
    {
       
        $cacheKey = 'twitter_data_' . md5($apiLink);

    
        return Cache::remember($cacheKey, 3600, function () use ($apiLink) {
            $client = new Client();

            $response = $client->request('GET', $apiLink, [
                'headers' => [
                    'Authorization' => 'Bearer ' . env('ACCESS_TOKEN_TWITTER'),
                ],
            ]);

            if ($response->getStatusCode() !== 200) {
                throw new \Exception('Error fetching data from Twitter API: ' . $response->getReasonPhrase());
            }

            $json = json_decode($response->getBody(), true);
            return $this->format($json);
        });
    }

    public function format(array $data): array
    {
        $formattedData = [];

        foreach ($data['data'] ?? [] as $tweet) {
            if (!isset($tweet['text'])) {
                continue;
            }

            $text = $tweet['text'];
            preg_match('/(.+)\s+(https?:\/\/\S+)$/', $text, $matches);

            $formattedData[] = [
                'id' => $tweet['id'],
                'text' => $matches[1] ?? $text,
                'image' => $matches[2] ?? null,
                'applicationName' => 'twitter',
            ];
        }

        return $formattedData;
    }
}
