<?php

namespace Killbill\Client;

use Psr\Http\Message\RequestInterface;
use GuzzleHttp\Psr7;

/**
 * This adds X-Killbill-ApiKey headers to GET /tenants/<id> request
 * Swagger didn't add it to generated TenantApi
 */
class AddTenantHeadersMiddleware
{
    /** @var callable  */
    private $nextHandler;

    private $configuration;

    public function __construct(callable $nextHandler, Configuration $configuration)
    {
        $this->nextHandler = $nextHandler;
        $this->configuration = $configuration;
    }

    public static function get(Configuration $configuration)
    {
        return function (callable $handler) use ($configuration) {
            return new AddTenantHeadersMiddleware($handler, $configuration);
        };
    }

    public function __invoke(RequestInterface $request, array $options)
    {
        if ($this->isTenantHeaderMissing($request)) {
            $request = $this->addTenantHeader($request);
        }

        $fn = $this->nextHandler;
        return $fn($request, $options);
    }

    private function isTenantHeaderMissing(RequestInterface $request)
    {
        return (in_array($request->getMethod(), ['GET'], true)
            && strpos($request->getUri()->getPath(), '/tenants') !== false);
    }

    private function addTenantHeader(RequestInterface $request)
    {
        $modify['set_headers'] = $this->getTenantHeaders();
        return Psr7\modify_request($request, $modify);
    }

    private function getTenantHeaders()
    {
        $headers = [];
        $apiKey = $this->configuration->getApiKeyWithPrefix('X-Killbill-ApiKey');
        if ($apiKey !== null) {
            $headers['X-Killbill-ApiKey'] = $apiKey;
        }
        $apiKey = $this->configuration->getApiKeyWithPrefix('X-Killbill-ApiSecret');
        if ($apiKey !== null) {
            $headers['X-Killbill-ApiSecret'] = $apiKey;
        }
        return $headers;
    }
}
