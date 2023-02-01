<?php

namespace App\Jobs;

use App\Models\FormResult;
use App\Utilities\Bitrix24\Entity\Contact;
use App\Utilities\Bitrix24\Entity\Deal;
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
        $contactId = Contact::createIfNotExist($this->formResult->phone, $this->formResult->name);

        $b24Deal = new Deal(getenv('B24_WEBHOOK_DEAL_CREATE'));

        $data = [
            'TITLE' => sprintf("Заявка ID: %s с формы - %s сайт: %s", $this->formResult->id, FormResult::FORM_NAMES[$this->formResult->slug_form], request()->getHost()),
            'UF_CRM_5E1DC411CF666' => Str::phoneNumber($this->formResult->phone),
            'CONTACT_ID' => $contactId,
        ];

        // Add Utm tags
        if ($utmSource = $this->formResult->utm_source) {
            $data = array_merge($data, $this->utmData());
        }

        if ($car = $this->formResult->car) {
            $data['COMMENTS'] = $car;
        }

        $preparedData['fields'] = $b24Deal->prepareData($data);

        // Creating deal in b24
        $deal = $b24Deal->create($preparedData);

        Log::debug($deal);
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
