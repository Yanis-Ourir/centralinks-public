<?php
namespace App\Service;

use App\Services\FormatApi\FormatApiDataInterface;
use App\Services\FormatApi\FormatApiTwitter;

class FormatApiFactory
{
    private array $services = [
        'reddit' => FormatApiReddit::class,
        'twitter' => FormatApiTwitter::class,
        // ON AJOUTE D'AUTRES SERVICES ICI PLUS TARD
    ];

    public function create(string $serviceName): FormatApiDataInterface
    {
        if (!isset($this->services[$serviceName])) {
            throw new \InvalidArgumentException(sprintf('Service "%s" not found.', $serviceName));
        }

        return new $this->services[$serviceName]();
    }
}