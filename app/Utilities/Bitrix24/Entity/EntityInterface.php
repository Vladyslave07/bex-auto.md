<?php


namespace App\Utilities\Bitrix24\Entity;


interface EntityInterface
{
    /**
     * Need for setting main webhook url
     *
     * @param string $webhook
     * @return mixed
     */
    public function setWebhook(string $webhook);
}