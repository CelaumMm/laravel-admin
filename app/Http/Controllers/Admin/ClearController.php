<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;

class ClearController extends Controller
{
    public function all()
    {
        Artisan::call('route:clear');
        Artisan::call('config:clear');
        Artisan::call('cache:clear');
        Artisan::call('view:clear');

        Artisan::call('route:cache');
        Artisan::call('config:cache');
        Artisan::call('view:cache');

        Artisan::call('optimize');

        return redirect()->route('admin.home');
    }

    public function route()
    {
        Artisan::call('route:clear');
        Artisan::call('route:cache');

        return redirect()->route('admin.home');
    }

    public function config()
    {
        Artisan::call('config:clear');
        Artisan::call('config:cache');

        return redirect()->route('admin.home');
    }

    public function cache()
    {
        Artisan::call('cache:clear');

        return redirect()->route('admin.home');
    }

    public function view()
    {
        Artisan::call('view:clear');
        Artisan::call('view:cache');

        return redirect()->route('admin.home');
    }
}
