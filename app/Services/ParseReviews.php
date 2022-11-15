<?php


namespace App\Services;


use App\Models\Domain;
use App\Models\Review;

class ParseReviews
{

    public $reviews;

    public function __construct()
    {
        $this->reviews = $this->allReviews();
    }

    /**
     * Fill reviews
     *
     * @param null $page
     */
    public function parseReviews()
    {
        // Одесса 0x40c631c0a5479ceb:0xe82bc8d3a1454024
        // Харьков 0x4127a1657b4a5bbf:0xed649ecaa8a66490
        // Киев 0x40d4c5701a8d5f63:0xae2c74b47a9d4866
        // Алматы 0x38836f90feb5d70d:0xa6414e3072bfdd2f

        $domains = Domain::domainsWithReviews();

        foreach ($domains as $domain) {
            self::getReviews($domain);
        }

    }

    public function getReviews($domain, $page = null)
    {
        $query = [
            "engine" => "google_maps_reviews",
            "hl" => 'ru',
            "data_id" => $domain->reviews_id,
        ];

        if ($page) {
            $query['next_page_token'] = $page;
        }

        $search = new GoogleSearch('ee5bce9dd569fe722e816475cbac7b4656f4c9b554d93f46e3a173a180045139');
        $result = $search->get_json($query);

        $reviews = $result->reviews;

        foreach ($reviews as $review) {
            if (!$this->allowToAddReviews($review)) {
                continue;
            }
            \App\Models\Review::create([
                'text' => $review->snippet,
                'rating' => $review->rating,
                'date_created_review' => $review->date,
                'user_name' => $review->user->name,
                'user_icon' => $review->user->thumbnail,
                'domain_id' => $domain->id
            ]);
        }

        if (strlen($result->serpapi_pagination->next_page_token) > 0)  {
            $this->getReviews($domain, $result->serpapi_pagination->next_page_token);
        }
    }

    public function allowToAddReviews($review)
    {
        if (strlen($review->snippet) > 0 && !$this->reviews->contains('user_name', $review->user->name)) {
            return true;
        }
        return false;
    }

    public function allReviews()
    {
        return Review::all();
    }

}