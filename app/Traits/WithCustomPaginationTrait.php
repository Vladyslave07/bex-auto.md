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
        if ($this->page) {
            $this->page += 1;
        } else {
            $this->page = 2;
        }
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
        if ($this->page > 1) {
            $page = 'page-' . $this->page;
        }
        $categorySlug = $this->category->slug;
        $routeName = 'category';
        $filterQuery = '';
        if ($this->filterQuery) {
            $routeName = 'category-filter';
            $filterQuery = $this->filterQuery;
        }

        if ($this->category->slug == \App\Models\Category::INDEX_CATEGORY_SLUG) {
            $categorySlug = null;
            if ($this->filterQuery) {
                $routeName = 'avto';
                $filterQuery = $this->filterQuery;
            }
            if (!$this->filterQuery && $this->page > 1) {
                $routeName = 'avto-page';
                $page = $this->page;
            }
        }

        $params = [];
        if ($categorySlug) {
            $params['category'] = $categorySlug;
        }
        if ($filterQuery) {
            $params['filter'] = $filterQuery;
        }
        if ($page) {
            $params['page'] = $page;
        }

        return route($routeName, $params, false);
    }
}
