<?php

namespace App\Http\Controllers\User;

use Inertia\Inertia;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        return Inertia::render('User/Home/Index');
    }
}
