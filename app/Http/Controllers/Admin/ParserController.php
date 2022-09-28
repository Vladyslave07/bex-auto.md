<?php


namespace App\Http\Controllers\Admin;



use App\Helper\General;
use App\Http\Requests\ParserRequest;
use App\Jobs\ParserRun;
use App\Models\Car;
use App\Models\Category;
use App\Models\Parser;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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

        $infoQueues = $this->infoQueue();

        return view('admin.parser', compact('categories', 'parserInfo', 'statuses', 'infoQueues'));
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

    public function infoQueue()
    {
        return DB::table('jobs')->where('queue', ParserRun::NAME_QUEUE)->get();
    }

    public function infoForAjax()
    {
        $data = [];

        foreach ($this->infoQueue() as $queue) {
            $queue->time = Carbon::parse($queue->created_at)->diffForHumans();
            $data[] = $queue;
        }

        return response()->json(['data' => $data]);
    }

    public function deleteQueue(Request $request)
    {
        if (!$request->get('id')) {
            return false;
        }
        DB::table('jobs')->where('id', $request->get('id'))->delete();
    }
}