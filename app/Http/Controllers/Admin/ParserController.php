<?php


namespace App\Http\Controllers\Admin;



use App\Helper\General;
use App\Http\Requests\ParserRequest;
use App\Jobs\ParserRun;
use App\Models\Car;
use App\Models\Category;
use App\Models\Parser;
use Illuminate\Support\Facades\DB;

class ParserController
{
    public function index()
    {
        // Categories
        $categories = Category::query()->active()->get();

        // Get parser fields
        $parserInfo = Parser::query()->get();

        // Status
        $statuses = General::getEnumValues(app(Car::class)->getTable(), 'status');

        return view('admin.parser', compact('categories', 'parserInfo', 'statuses'));
    }

    public function save(ParserRequest $request)
    {
        $fields = $request->validated();

        foreach ($fields as $slug => $field) {
            $record = Parser::query()->where('slug', $slug)->first();
            if (!$record) {
                continue;
            }

            $record->update(['value' => $field]);
        }
    }

    /**
     * Parser Run
     *
     * @param ParserRequest $request
     */
    public function download()
    {
        ParserRun::dispatch();
        return true;
    }
}