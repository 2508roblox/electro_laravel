<?php
namespace App\Services;

use GuzzleHttp\Client;

class ImgurService
{
    protected $clientId;
    protected $clientSecret;
    protected $httpClient;

    public function __construct()
    {
        $this->clientId = config('imgur.client_id');
        $this->clientSecret = config('imgur.client_secret');
        $this->httpClient = new Client();
    }

    public function uploadImage($imageFile)
    {
        $formData = [
            'headers' => [
                'Authorization' => 'Client-ID ' . $this->clientId,
            ],
            'multipart' => [
                [
                    'name' => 'image',
                    'contents' => fopen($imageFile->path(), 'r'),
                ],
            ],
        ];

        $response = $this->httpClient->post('https://api.imgur.com/3/image', $formData);
        $responseData = json_decode($response->getBody(), true);

        return $responseData['data']['link'] ?? null;
    }
}
