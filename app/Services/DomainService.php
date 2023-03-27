<?php

namespace App\Services;

use App\Models\Domain;
use Illuminate\Support\Str;

class DomainService
{
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
