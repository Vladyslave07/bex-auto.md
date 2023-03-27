<?php

namespace App\Utilities\Bitrix24\Entity;

use App\Utilities\Bitrix24\Traits\B24Trait;

class Lead extends EntityBase
{
    use B24Trait;

    const CREATE_LEAD_API_METHOD = 'crm.lead.add';

    /**
     * @param array $data
     * @return \Symfony\Contracts\HttpClient\ResponseInterface
     * @throws \Bitrix24\SDK\Core\Exceptions\InvalidArgumentException
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function create(array $data = [])
    {
        $result = $this->getClient()->getResponse(self::CREATE_LEAD_API_METHOD, $data);
        $result = json_decode($result->getContent(), true);
        return $result;
    }

}
