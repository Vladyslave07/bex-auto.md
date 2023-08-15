<?php

namespace App\Jobs;

use App\Models\Domain;
use App\Models\FormResult;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;

class FormResultToB24 implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $formResult;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($formResultId)
    {
        $this->formResult = FormResult::query()->find($formResultId);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $lead = new \App\Utilities\Bitrix24\Entity\Lead(getenv('B24_WEBHOOK_LEAD_CREATE'));

        $domain = env('KZ_APP_URL');
        if ($this->formResult?->domain_id == Domain::DEFAULT_DOMAIN) {
            $domain = env('UK_APP_URL');
        }

        $title = sprintf("Заявка ID: %s с формы - %s сайт: %s", $this->formResult->id, FormResult::FORM_NAMES[$this->formResult->slug_form], $domain);

        $data = [
            'TITLE' => $title,
            "NAME"=> $this->formResult->name,
            "STATUS_ID"=> "NEW",
        ];

        if ($car = $this->formResult->car) {
            $data['COMMENTS'] = $car;
        }

        // Add Utm tags
        if ($this->formResult->utm_source) {
            $data = array_merge($data, $this->utmData());
        }

        if ($car = $this->formResult->car) {
            $data['COMMENTS'] = $car;
        }

        $data['PHONE'] = [['VALUE' => Str::phoneNumber($this->formResult->phone), 'VALUE_TYPE' => 'MOBILE']];

        $preparedData['fields'] = $data;


        // Creating deal in b24
        $lead->create($preparedData);
    }

    /**
     * @return array
     */
    public function utmData()
    {
        $data = [];

        if ($source = $this->formResult->utm_source) {$data['UTM_SOURCE'] = $source;}
        if ($medium = $this->formResult->utm_medium) {$data['UTM_MEDIUM'] = $medium;}
        if ($campaign = $this->formResult->utm_campaign) {$data['UTM_CAMPAIGN'] = $campaign;}

        return $data;
    }

}
