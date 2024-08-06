<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Response;

class CollectFormResults extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'form-results:collect';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $formResults = \App\Models\FormResult::query()
            ->whereNotNull(['utm_source'])
            ->where('created_at' ,'>=', '2024-01-05 00:00:00')
            ->where('created_at' ,'<', '2024-01-23 00:00:00')
            ->get();

        $csvFileName = 'form-results.csv';

        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$csvFileName",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        );

        $handle = fopen($csvFileName, 'w');

        // Add CSV headers
        fputcsv($handle, [
            'id',
            'name',
            'phone',
            'created_at',
            'utm_source',
            'utm_medium',
            'utm_campaign',
            'utm_term',
            'utm_content',
        ]);

        // Add data to CSV
        foreach ($formResults as $row) {
            fputcsv($handle, [
                $row->id,
                $row->name,
                $row->phone,
                $row->created_at,
                $row->utm_source,
                $row->utm_medium,
                $row->utm_campaign,
                $row->utm_term,
                $row->utm_content,
            ]);
        }

        fclose($handle);

        // этот код подходит для роута, а не для консольной команды
        // разместил его тут, чтобы не потерять
        return Response::download($csvFileName, $csvFileName, $headers);
    }
}
