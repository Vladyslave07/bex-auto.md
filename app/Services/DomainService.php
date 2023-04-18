<?php

namespace App\Services;

use App\Models\Domain;
use Illuminate\Support\Str;

class DomainService
{
    public Domain $domain;

    /**
     * @param Domain $domain
     */
    public function setDomain(Domain $domain): void
    {
        $this->domain = $domain;
    }

    /**
     * @return Domain
     */
    public function getDomain(): Domain
    {
        return $this->domain;
    }

    public function getDomainUrl()
    {
        return getenv(mb_strtoupper($this->getDomain()?->slug ?? Domain::DEFAULT_DOMAIN) . '_APP_URL');
    }


    public static function storagePath(): string
    {
        if (app()->runningInConsole()) {
            return env('UK_APP_URL').'/storage';
        }

        $domainSlug = trim(preg_replace('/(.*)\/\//', '', str_replace(env('APP_DOMAIN'), '', request()->root())), '.') ?: 'uk';
        $domainSlug = mb_strtoupper($domainSlug);
        return  env($domainSlug . '_APP_URL').'/storage';
    }
}
