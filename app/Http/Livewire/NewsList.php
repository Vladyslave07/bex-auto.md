<?php

namespace App\Http\Livewire;

use App\Models\News;
use Livewire\Component;
use Livewire\WithPagination;

class NewsList extends Component
{
    use WithPagination;

    public function newsList()
    {
        return News::newsList($this->page);
    }

    public function paginationView()
    {
        return 'vendor.pagination.news';
    }

    public function render()
    {
        return view('livewire.news-list', [
            'news' => $this->newsList()
        ]);
    }
}
