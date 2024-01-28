<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $searchTerm = $request->input('q');
        if ($searchTerm) {
            return Car::query()
                ->whereRaw("UPPER(JSON_UNQUOTE(JSON_EXTRACT(`title`, '$.ru'))) LIKE '" . strtoupper($searchTerm) . "%'")
                ->orWhere('id', $searchTerm)
                ->paginate(10);
        }

        return Car::query()->paginate(10);
    }

    public function show($id)
    {
        return Car::find($id);
    }
}
