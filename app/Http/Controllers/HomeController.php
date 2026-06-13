<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facility;
use App\Models\Greeting;
use App\Models\Cooperation;

class HomeController extends Controller
{
    public function index()
    {
        $facilities = Facility::all();
        $greetings = Greeting::latest()->first();
        $cooperations = Cooperation::all();

        return view('home', compact('facilities', 'greetings', 'cooperations'));
    }
}