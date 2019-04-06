<?php

namespace Killbill\Client;

use Killbill\Client\Swagger\Configuration;
use Psr\Http\Message\RequestInterface;
use GuzzleHttp\Psr7;

/**
 * This adds X-Killbill-ApiKey headers to the whitelisted routes.
 */
class AddAuthHeadersMiddleware
{
    const BASIC_AUTH = 1;
    const TENANT_KEY = 2;

    /** @var callable  */
    private $nextHandler;

    private $configuration;

    private $whitelist = [
        ['GET|PUT', '/1.0/kb/tenants', [self::TENANT_KEY]],
        ['POST', '/1.0/kb/test/clock', [self::BASIC_AUTH, self::TENANT_KEY]],
    ];
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
            return new AddAuthHeadersMiddleware($handler, $configuration);
        };
    }

    /**
     * @param RequestInterface $request
     * @param array            $options
     * @return mixed
     */
    public function __invoke(RequestInterface $request, array $options)
    {
        $actions = $this->getActions($request);

        if (!empty($actions)) {
            $request = $this->addHeaders($request, $actions);
        }
        $fn = $this->nextHandler;

        return $fn($request, $options);
    }

    /**
     * @param RequestInterface $request
     * @return array
     */
    private function getActions(RequestInterface $request)
    {
        foreach ($this->whitelist as list($method, $path, $actions)) {
            if (preg_match('/'.$method.'/i', $request->getMethod())
                && strpos($request->getUri()->getPath(), $path) !== false) {
                return $actions;
            }
        }

        return [];
    }

    /**
     * @param RequestInterface $request
     * @param array $actions
     * @return RequestInterface
     */
    private function addHeaders(RequestInterface $request, array $actions)
    {
        $headers = [];
        if (in_array(self::TENANT_KEY, $actions, true)) {
            $headers = array_merge($headers, $this->getTenantHeader());
        }
        if (in_array(self::BASIC_AUTH, $actions, true)) {
            $headers = array_merge($headers, $this->getBasicAuthHeader());
        }

        $modify['set_headers'] = $headers;

        return Psr7\modify_request($request, $modify);
    }

    /**
     * @return array
     */
    private function getTenantHeader()
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

    /**
     * @return array
     */
    private function getBasicAuthHeader()
    {
        $headers = [];

        if ($this->configuration->getUsername() !== null || $this->configuration->getPassword() !== null) {
            $encoded = base64_encode($this->configuration->getUsername().':'.$this->configuration->getPassword());
            $headers['Authorization'] = 'Basic '.$encoded;
        }

        return $headers;
    }
}
