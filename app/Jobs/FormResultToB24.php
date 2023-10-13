<?php

namespace App\Jobs;

use App\Http\Livewire\Forms\DiscountForm;
use App\Models\FormResult;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class FormResultToB24 implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    const DEFAULT_CONNECTION = 'database';

    protected $formResult;
    protected $domain;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($formResultId)
    {
        $this->formResult = FormResult::query()->find($formResultId);
        $this->setDomain();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $lead = new \App\Utilities\Bitrix24\Entity\Lead($this->formResult->slug_form == 'auto_for_zsu' ? getenv('B24_WEBHOOK_LEAD_AUTO_FOR_ZSU_CREATE') : getenv('B24_WEBHOOK_LEAD_CREATE'));

        $data = [
            'TITLE' => $this->title(),
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


    public function title()
    {
        if ($this->formResult->slug_form == DiscountForm::SLUG_FORM) {
            $categoryTitle = $this->formResult->category?->title;
            $popupTitle = "\"" . $this->formResult->popup->title . "\"";

            $title = "Заявка ID: %s с попапа - %s ";
            if ($categoryTitle) {
                $title .= "категория: %s ";
            }
            $title .= "сайт: %s";

            return sprintf($title, $this->formResult->id, $popupTitle, $categoryTitle, $this->domain);
        }

        return sprintf("Заявка ID: %s с формы - %s сайт: %s", $this->formResult->id, FormResult::FORM_NAMES[$this->formResult->slug_form], $this->domain);
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

    /**
     * @return void
     */
    public function setDomain()
    {
        $this->domain = env('KZ_APP_URL');
        if ($this->connection == self::DEFAULT_CONNECTION) {
            $this->domain = env('UK_APP_URL');
        }
    }

}
