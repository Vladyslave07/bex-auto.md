<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function index(Car $car)
    {
        return view('html.card');
    }
}
