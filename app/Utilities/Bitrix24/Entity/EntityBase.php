<?php


namespace App\Utilities\Bitrix24\Entity;


use App\Utilities\Bitrix24\Traits\B24Trait;
use Bitrix24\SDK\Core\ApiClient;
use Symfony\Component\HttpClient\HttpClient;

abstract class EntityBase implements EntityInterface
{
    use B24Trait;

    public $webhook;

    public function __construct($webhook)
    {
        $this->setWebhook($webhook);
    }

    /**
     * @return ApiClient
     * @throws \Bitrix24\SDK\Core\Exceptions\InvalidArgumentException
     */
    public function getClient(): ApiClient
    {
        return new ApiClient(
            B24Trait::getCredentials($this->webhook),
            HttpClient::create(),
            self::getLoggerInstance('b24-api-contact-debug.log')
        );
    }

    public function setWebhook(string $webhook)
    {
        $this->webhook = $webhook;
    }

}