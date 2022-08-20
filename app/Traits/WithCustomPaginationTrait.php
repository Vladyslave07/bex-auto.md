<?php


namespace App\Traits;


trait WithCustomPaginationTrait
{
    public $page = 1;

    public function pageNum($page)
    {
        return preg_replace('/[^0-9]/', '$1', $page);
    }

    public function previousPage()
    {
        if ($this->page - 1 > 0) {
            $this->page -= 1;
        } else {
            $this->page = 1;
        }
        $this->setPaginateUrl();
    }

    public function nextPage()
    {
        $this->page += 1;
        $this->setPaginateUrl();
    }

    public function setPage($page)
    {
        $this->page = $page;
        $this->setPaginateUrl();
    }

    /**
     * Call event from js and set paginate url
     */
    public function setPaginateUrl()
    {
        $this->dispatchBrowserEvent('setPageUrl', ['url' => $this->makePaginateUrl()]);
    }

    /**
     * Make a pagination url for category
     * like: /category/page-2
     *
     * @return string
     */
    public function makePaginateUrl(): string
    {
        $page = '';
        if ($this->page != 1) {
            $page = 'page-' . $this->page;
        }

        return route('category', ['category' => $this->category->slug, 'page' => $page], false);
    }
}