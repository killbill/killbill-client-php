<?php

namespace Killbill\Client;

use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Psr7\Message;
use GuzzleHttp\Psr7\Uri;
use GuzzleHttp\Psr7\UriResolver;
use GuzzleHttp\Psr7\Utils;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Follows Location header when present
 * along with 201 status code
 */
class RedirectOnPostMiddleware
{
    /** @var callable  */
    private $nextHandler;

    /**
     * @param callable $nextHandler
     */
    public function __construct(callable $nextHandler)
    {
        $this->nextHandler = $nextHandler;
    }

    /**
     * @return \Closure
     */
    public static function get(): \Closure
    {
        return function (callable $handler) {
            return new RedirectOnPostMiddleware($handler);
        };
    }

    /**
     * @param RequestInterface $request
     * @param array            $options
     *
     * @return mixed
     */
    public function __invoke(RequestInterface $request, array $options)
    {
        $fn = $this->nextHandler;

        return $fn($request, $options)
            ->then(function (ResponseInterface $response) use ($request, $options) {
                return $this->checkRedirect($request, $options, $response);
            });
    }

    /**
     * @param RequestInterface  $request
     * @param array             $options
     * @param ResponseInterface $response
     *
     * @return PromiseInterface|ResponseInterface
     */
    public function checkRedirect(RequestInterface $request, array $options, ResponseInterface $response)
    {
        if ($response->getStatusCode() !== 201 || !$response->hasHeader('Location')) {
            return $response;
        }

        $nextRequest = $this->modifyRequest($request, $response);

        /** @var PromiseInterface|ResponseInterface $promise */
        $promise = $this($nextRequest, $options);

        return $promise;
    }

    /**
     * @param RequestInterface  $request
     * @param ResponseInterface $response

     * @return RequestInterface
     */
    private function modifyRequest(RequestInterface $request, ResponseInterface $response)
    {
        $modify = [
            'method' => 'GET',
            'body' => '',
            'uri' => UriResolver::resolve(
                $request->getUri(),
                new Uri($response->getHeaderLine('Location'))
            ),
        ];
        Message::rewindBody($request);

        return Utils::ModifyRequest($request, $modify);
    }
}
