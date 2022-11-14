<?php


namespace App\Utilities\Bitrix24\Traits;


use Monolog\Handler\StreamHandler;
use Monolog\Logger;

trait B24Trait
{
    /**
     * @param string $logFileName
     * @return Logger
     */
    public static function getLoggerInstance(string $logFileName = 'b24-api-default.log'): Logger
    {
        $log = new Logger('name');
        $log->pushHandler(new StreamHandler('storage/logs/' . $logFileName, Logger::DEBUG));
        return $log;
    }

    /**
     * @param string $webHookUrl
     * @return \Bitrix24\SDK\Core\Credentials\Credentials
     * @throws \Bitrix24\SDK\Core\Exceptions\InvalidArgumentException
     */
    public static function getCredentials(string $webHookUrl = '')
    {
        return new \Bitrix24\SDK\Core\Credentials\Credentials(
            new \Bitrix24\SDK\Core\Credentials\WebhookUrl($webHookUrl),
            null,
            null,
            null
        );
    }

}