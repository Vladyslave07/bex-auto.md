<?php
namespace App\Services;

class GoogleSearch extends SerpApiSearch {
  public function __construct($api_key) {
    parent::__construct($api_key, 'google');
  }
}

