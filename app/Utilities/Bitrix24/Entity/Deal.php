<?php


namespace App\Utilities\Bitrix24\Entity;

use App\Utilities\Bitrix24\Traits\B24Trait;
use Bitrix24\SDK\Core\ApiClient;
use Symfony\Component\HttpClient\HttpClient;

class Deal extends EntityBase
{
    use B24Trait;

    const CATEGORY_ID = 108;
    const SOURCE_ID = 191;

    const CREATE_DEAL_API_METHOD = 'crm.deal.add';

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
        $result = $this->getClient()->getResponse(self::CREATE_DEAL_API_METHOD, $data);
        $result = json_decode($result->getContent(), true);
        return $result;
    }

    /**
     * @param $data
     * @return array
     */
    public function prepareData($data): array
    {
        $data = array_merge($data, [
            'CATEGORY_ID' => self::CATEGORY_ID,
            'SOURCE_ID' => self::SOURCE_ID,
        ]);

        return $data;
    }
}