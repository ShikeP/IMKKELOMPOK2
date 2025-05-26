<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LandingPage;

class LandingPageController extends Controller
{
    public function index()
    {
        $landing = LandingPage::first();
        return view('landing', compact('landing'));
    }
}
