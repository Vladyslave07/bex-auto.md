<?php

namespace App\Services\Admin;

use App\Models\Domain;
use Illuminate\Support\Str;
use function App\Services\mb_strtoupper;

class MenuService
{
    public $model;

    public function setModel($model): void
    {
        $this->model = $model;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function getDomainUrl()
    {
        return getenv(mb_strtoupper($this->getDomain()?->slug ?? Domain::DEFAULT_DOMAIN) . '_APP_URL');
    }

}
