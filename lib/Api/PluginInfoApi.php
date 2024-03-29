<?php
/**
 * PluginInfoApi
 * PHP version 7.1+
 *
 * @category Class
 * @package  Killbill\Client\Swagger
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * Kill Bill
 *
 * Kill Bill is an open-source billing and payments platform
 *
 * OpenAPI spec version: 0.24.0
 * 
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 3.0.22
 */
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Killbill\Client\Swagger\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\RequestOptions;
use Killbill\Client\Swagger\ApiException;
use Killbill\Client\Swagger\Configuration;
use Killbill\Client\Swagger\HeaderSelector;
use Killbill\Client\Swagger\ObjectSerializer;

/**
 * PluginInfoApi Class Doc Comment
 *
 * @category Class
 * @package  Killbill\Client\Swagger
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class PluginInfoApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation getPluginsInfo
     *
     * Retrieve the list of registered plugins
     *
     *
     * @throws \Killbill\Client\Swagger\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Killbill\Client\Swagger\Model\PluginInfo[]
     */
    public function getPluginsInfo()
    {
        list($response) = $this->getPluginsInfoWithHttpInfo();
        return $response;
    }

    /**
     * Operation getPluginsInfoWithHttpInfo
     *
     * Retrieve the list of registered plugins
     *
     *
     * @throws \Killbill\Client\Swagger\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Killbill\Client\Swagger\Model\PluginInfo[], HTTP status code, HTTP response headers (array of strings)
     */
    public function getPluginsInfoWithHttpInfo()
    {
        $returnType = '\Killbill\Client\Swagger\Model\PluginInfo[]';
        $request = $this->getPluginsInfoRequest();

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            return $this->handleResponse($request, $response, $returnType);
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Killbill\Client\Swagger\Model\PluginInfo[]',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getPluginsInfoAsync
     *
     * Retrieve the list of registered plugins
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPluginsInfoAsync()
    {
        return $this->getPluginsInfoAsyncWithHttpInfo()
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getPluginsInfoAsyncWithHttpInfo
     *
     * Retrieve the list of registered plugins
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPluginsInfoAsyncWithHttpInfo()
    {
        $returnType = '\Killbill\Client\Swagger\Model\PluginInfo[]';
        $request = $this->getPluginsInfoRequest();

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($request, $returnType) {
                    return $this->handleResponse($request, $response, $returnType);
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getPluginsInfo'
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getPluginsInfoRequest()
    {

        $resourcePath = '/1.0/kb/pluginsInfo';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\Utils::jsonEncode($httpBody);
            } elseif (is_array($httpBody) && $headers['Content-Type'] === 'application/json') {
                $httpBody = array_map(function($value) {
                    return ObjectSerializer::sanitizeForSerialization($value);
                }, $_tempBody);
                $httpBody = \GuzzleHttp\Utils::jsonEncode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\Query::build($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-Killbill-ApiKey');
        if ($apiKey !== null) {
            $headers['X-Killbill-ApiKey'] = $apiKey;
        }
        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('X-Killbill-ApiSecret');
        if ($apiKey !== null) {
            $headers['X-Killbill-ApiSecret'] = $apiKey;
        }
        // this endpoint requires HTTP basic authentication
        if ($this->config->getUsername() !== null || $this->config->getPassword() !== null) {
            $headers['Authorization'] = 'Basic ' . base64_encode($this->config->getUsername() . ":" . $this->config->getPassword());
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }


    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
    
    /**
     * Response handler
     *
     * @param Request  $request    Request
     * @param Response $response   Response
     * @param string   $returnType Return type
     *
     * @throws \Killbill\Client\Swagger\ApiException on non-2xx response
     * @return array of returned object matching type, HTTP status code, HTTP response headers (array of strings)
     */
    protected function handleResponse($request, $response, $returnType)
    {
        $statusCode = $response->getStatusCode();

        if ($statusCode < 200 || $statusCode > 299) {
            throw new ApiException(
                sprintf(
                    '[%d] Error connecting to the API (%s)',
                    $statusCode,
                    $request->getUri()
                ),
                $statusCode,
                $response->getHeaders(),
                $response->getBody()
            );
        }

        if ($statusCode === 201 && $response->hasHeader('Location')) {
            // This is a Created redirection, getting the object from the location target
            $location = $response->getHeader('Location')[0];

            if (strpos($location, $this->config->getHost()) !== 0) {
                throw new ApiException(
                    sprintf(
                        '[%d] Received a location header not matching the configured host (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $options = $this->createHttpClientOption();
            $locationRequest = new Request(
                'GET',
                $location,
                $request->getHeaders()
            );
            $locationResponse = $this->client->send($locationRequest, $options);

            $responseBody = $locationResponse->getBody();
        } else {
            $responseBody = $response->getBody();
        }

        if ($returnType === null || $returnType === '') {
            $returnedObject = null;
        } else {
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string', 'integer', 'bool'])) {
                    $content = json_decode($content);
                }
            }
            
            $returnedObject = ObjectSerializer::deserialize($content, $returnType, []);
        }

        return [
            $returnedObject,
            $response->getStatusCode(),
            $response->getHeaders()
        ];
    }
}
