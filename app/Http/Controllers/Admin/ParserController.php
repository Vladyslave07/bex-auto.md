<?php


namespace App\Http\Controllers\Admin;



use App\Http\Requests\ParserRequest;
use App\Jobs\ParserRun;
use App\Models\Category;
use App\Models\Parser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ParserController
{
    public function index()
    {
        // Categories
        $categories = Category::query()->active()->get();

        // Get parser fields
        $parserInfo = Parser::query()->get();

        return view('admin.parser', compact('categories', 'parserInfo'));
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