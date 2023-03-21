<?php

namespace App\Traits;

use App\Models\Domain;

trait FormFilterTrait
{
    function addDomainFilter()
    {
        $this->crud->addFilter([
            'type'  => 'dropdown',
            'name'  => 'domain',
            'label' => 'Домен'
        ], function () {

            $domains = Domain::list();
            $domainsPrepare = [];
            foreach ($domains as $domain) {
                if (!in_array($domain->id, [Domain::DEFAULT_DOMAIN, Domain::KAZACHSTAN_DOMAIN])) {
                    continue;
                }
                $domainsPrepare[$domain->id] = $domain->title;
            }
            return $domainsPrepare;
        }, function ($value) {
            $this->crud->addClause('where', 'domain_id', $value);
        });
    }
}
