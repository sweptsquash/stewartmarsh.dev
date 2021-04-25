<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

class HomepageController extends Controller
{
    /**
     * Homepage
     *
     * @return InertiaResponse
     */
    public function index(): InertiaResponse
    {
        return Inertia::render('Index');
    }

    /**
     * Experience Page
     *
     * @return InertiaResponse
     */
    public function experience(): InertiaResponse
    {
        return Inertia::render('Experience')
            ->withViewData(['meta' => ['title' => 'Experience']]);
    }

    /**
     * Contact Me Page
     *
     * @return InertiaResponse
     */
    public function contact(): InertiaResponse
    {
        return Inertia::render('Contact')
            ->withViewData(['meta' => ['title' => 'Contact Me']]);
    }
}
