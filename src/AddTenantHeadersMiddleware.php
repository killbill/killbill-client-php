<?php

namespace Killbill\Client;

use Killbill\Client\Swagger\Configuration;
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

    /**
     * @param callable      $nextHandler
     * @param Configuration $configuration
     */
    public function __construct(callable $nextHandler, Configuration $configuration)
    {
        $this->nextHandler = $nextHandler;
        $this->configuration = $configuration;
    }

    /**
     * @param Configuration $configuration
     * @return \Closure
     */
    public static function get(Configuration $configuration)
    {
        return function (callable $handler) use ($configuration) {
            return new AddTenantHeadersMiddleware($handler, $configuration);
        };
    }

    /**
     * @param RequestInterface $request
     * @param array            $options
     * @return mixed
     */
    public function __invoke(RequestInterface $request, array $options)
    {
        if ($this->isTenantHeaderMissing($request)) {
            $request = $this->addTenantHeader($request);
        }

        $fn = $this->nextHandler;

        return $fn($request, $options);
    }

    /**
     * @param RequestInterface $request
     * @return bool
     */
    private function isTenantHeaderMissing(RequestInterface $request)
    {
        return (in_array($request->getMethod(), ['GET'], true)
            && strpos($request->getUri()->getPath(), '/tenants') !== false);
    }

    /**
     * @param RequestInterface $request
     * @return RequestInterface
     */
    private function addTenantHeader(RequestInterface $request)
    {
        $modify['set_headers'] = $this->getTenantHeaders();

        return Psr7\modify_request($request, $modify);
    }

    /**
     * @return array
     */
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
