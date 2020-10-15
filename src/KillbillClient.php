<?php

namespace Killbill\Client;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\CurlHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\MessageFormatter;
use GuzzleHttp\Middleware;
use Killbill\Client\Swagger\Api;
use Killbill\Client\Swagger\Configuration;
use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;
use Psr\Log\NullLogger;

/**
 * Killbill client wrapper
 * @method Api\AccountApi getAccountApi
 * @method Api\AdminApi getAdminApi
 * @method Api\BundleApi getBundleApi
 * @method Api\CatalogApi getCatalogApi
 * @method Api\CreditApi getCreditApi
 * @method Api\CustomFieldApi getCustomFieldApi
 * @method Api\ExportApi getExportApi
 * @method Api\InvoiceApi getInvoiceApi
 * @method Api\InvoiceItemApi getInvoiceItemApi
 * @method Api\InvoicePaymentApi getInvoicePaymentApi
 * @method Api\NodesInfoApi getNodesInfoApi
 * @method Api\OverdueApi getOverdueApi
 * @method Api\PaymentApi getPaymentApi
 * @method Api\PaymentGatewayApi getPaymentGatewayApi
 * @method Api\PaymentMethodApi getPaymentMethodApi
 * @method Api\PaymentTransactionApi getPaymentTransactionApi
 * @method Api\PluginInfoApi getPluginInfoApi
 * @method Api\SecurityApi getSecurityApi
 * @method Api\SubscriptionApi getSubscriptionApi
 * @method Api\TagApi getTagApi
 * @method Api\TagDefinitionApi getTagDefinitionApi
 * @method Api\TenantApi getTenantApi
 * @method Api\UsageApi getUsageApi
 */
class KillbillClient
{
    /** @var LoggerInterface */
    private $logger;

    /** @var Client */
    private $guzzleClient;

    /** @var Configuration */
    private $configuration;

    /**
     * @param LoggerInterface|null $logger
     * @param string               $host
     * @param string               $username
     * @param string               $password
     */
    public function __construct(LoggerInterface $logger = null, string $host = 'http://localhost:8080', string $username = 'admin', string $password = 'password')
    {
        $this->logger = $logger ?: new NullLogger();
        $this->configuration = (new Configuration())
            ->setHost($host)
            ->setUsername($username)
            ->setPassword($password);
    }

    /**
     * @param string $value
     */
    public function setApiKey(string $value): void
    {
        $this->configuration->setApiKey('X-Killbill-ApiKey', $value);
    }

    /**
     * @param string $value
     */
    public function setApiSecret(string $value): void
    {
        $this->configuration->setApiKey('X-Killbill-ApiSecret', $value);
    }

    /**
     * @param string $name
     * @param array  $args
     *
     * @return mixed
     */
    public function __call(string $name, array $args)
    {
        if (strpos($name, 'get') !== 0) {
            throw new \RuntimeException(sprintf('Method "%s" not found', $name));
        }
        list(, $class) = explode('get', $name, 2);
        $fqcn = 'Killbill\\Client\\Swagger\\Api\\'.$class;

        return new $fqcn($this->getGuzzleClient(), $this->configuration);
    }

    /**
     * @return Client
     */
    public function getGuzzleClient(): Client
    {
        if (!$this->guzzleClient) {
            $stack = new HandlerStack();
            $stack->setHandler(new CurlHandler());
            $stack->push(RedirectOnPostMiddleware::get());
            $stack->push(AddAuthHeadersMiddleware::get($this->configuration));
            $stack->push(Middleware::log($this->logger, new MessageFormatter(), LogLevel::ERROR));
            $this->guzzleClient = new Client([
                'handler' => $stack,
                'base_uri' => $this->configuration->getHost().'/1.0/kb/',
                'headers' => [
                    'User-Agent' => $this->configuration->getUserAgent(),
                ],
            ]);
        }

        return $this->guzzleClient;
    }

    /**
     * @return Configuration
     */
    public function getConfiguration(): Configuration
    {
        return $this->configuration;
    }
}
