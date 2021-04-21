<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class HomepageController extends Controller
{
    public function index()
    {
        return Inertia::render('Index');
    }
}
