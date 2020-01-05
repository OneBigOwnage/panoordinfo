<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class MaintenanceController extends Controller
{
    public function DBMigrate()
    {
        Artisan::call('migrate', ['--force' => true]);

        session()->flash('artisan-output', Artisan::output());

        return redirect()->route('maintenance');
    }

    public function DBMigrateFresh()
    {
        Artisan::call('migrate:fresh', ['--force' => true]);

        session()->flash('artisan-output', Artisan::output());

        return redirect()->route('maintenance');
    }
}
