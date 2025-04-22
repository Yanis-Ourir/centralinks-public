<?php 
namespace App\Services\FormatApi;

interface FormatApiDataInterface
{
    public function ApiCall(string $apiLink): array;
    public function format(array $data): array;
}