<?php

namespace App\Services;

use App\Models\Domain;
use Illuminate\Support\Str;

class DomainService
{
    public static function storagePath(): string
    {
        $domainSlug = trim(preg_replace('/(.*)\/\//', '', str_replace(env('APP_DOMAIN'), '', request()->root())), '.') ?: 'uk';
        $domainSlug = Str::upper($domainSlug);
        return  env($domainSlug . '_APP_URL').'/storage';
    }
}
