<?php

namespace Killbill\Client;

use GuzzleHttp\Promise\PromiseInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Psr7;

class RedirectOnPostMiddleware
{
    /** @var callable  */
    private $nextHandler;

    public function __construct(callable $nextHandler)
    {
        $this->nextHandler = $nextHandler;
    }

    public static function get()
    {
        return function (callable $handler) {
            return new RedirectOnPostMiddleware($handler);
        };
    }

    public function __invoke(RequestInterface $request, array $options)
    {
        $fn = $this->nextHandler;

        return $fn($request, $options)
            ->then(function (ResponseInterface $response) use ($request, $options) {
                return $this->checkRedirect($request, $options, $response);
            });
    }

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

    private function modifyRequest(RequestInterface $request, ResponseInterface $response)
    {
        $modify = [
            'method' => 'GET',
            'body' => '',
            'uri' => Psr7\UriResolver::resolve(
                $request->getUri(),
                new Psr7\Uri($response->getHeaderLine('Location'))
            ),
        ];
        Psr7\rewind_body($request);
        return Psr7\modify_request($request, $modify);
    }
}
