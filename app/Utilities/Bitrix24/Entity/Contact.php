<?php


namespace App\Utilities\Bitrix24\Entity;


use App\Utilities\Bitrix24\Traits\B24Trait;
use Bitrix24\SDK\Core\ApiClient;
use Illuminate\Support\Str;
use Symfony\Component\HttpClient\HttpClient;

class Contact extends EntityBase
{
    use B24Trait;

    const CLIENT_SOURCE_ID = 191;
    const CLIENT_TYPE_ID = 'CLIENT';

    const CREATE_CLIENT_API_METHOD = 'crm.contact.add';
    const LIST_CLIENT_API_METHOD = 'crm.contact.list';

    /**
     * @param string $phone
     * @param string $userName
     * @return mixed
     * @throws \Bitrix24\SDK\Core\Exceptions\InvalidArgumentException
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public static function createIfNotExist(string $phone, string $userName = 'Unknown')
    {
        $b24Contact = new Contact(getenv('B24_WEBHOOK_CONTACT_CREATE'));

        // Return exist contact
        $contact = null;
        $contacts = $b24Contact->getList(['PHONE' => Str::phoneNumber($phone)]);
        if ($contacts['total'] > 0) {
            $contact = $contacts['result'][0]['ID'];
        }

        // Create new one
        $data = ["NAME" => $userName, "PHONE" => [["VALUE" => Str::phoneNumber($phone), "VALUE_TYPE" => "MOBILE"]]];
        $preparedData['fields'] = $b24Contact->prepareData($data);
        $contact = $b24Contact->create($preparedData)['result'];

        return $contact;
    }
    
    /**
     * @param array $data
     * @return mixed
     * @throws \Bitrix24\SDK\Core\Exceptions\InvalidArgumentException
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function create(array $data = [])
    {
        $result = $this->getClient()->getResponse(self::CREATE_CLIENT_API_METHOD, $data);
        $result = json_decode($result->getContent(), true);
        return $result;
    }

    /**
     * @param $filter
     * @param string[] $select
     * @param array $order
     * @return mixed
     * @throws \Bitrix24\SDK\Core\Exceptions\InvalidArgumentException
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function getList($filter, $select = ['*'], $order = [])
    {
        $data = [
            'order' => $order,
            'filter' => $filter,
            'select' => $select,
        ];

        $result = $this->getClient()->getResponse(self::LIST_CLIENT_API_METHOD, $data);
        $result = json_decode($result->getContent(), true);
        return $result;
    }

    /**
     * @param $data
     * @return array
     */
    public function prepareData($data)
    {
        $data = array_merge($data, [
            'SOURCE_ID' => self::CLIENT_SOURCE_ID,
            'TYPE_ID' => self::CLIENT_TYPE_ID,
        ]);

        if (session('checked_utm')) {
            $utmMarks = array_change_key_case(json_decode(session('utm_marks'), true), CASE_UPPER);
            $data = array_merge($data, $utmMarks);
        }

        return $data;
    }
}