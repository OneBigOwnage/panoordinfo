<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;

class MaintenanceController extends Controller
{
    public function DBMigrate()
    {
        if (auth()->user()->name !== env('INITIAL_USER_NAME')) {
            return back()->with('artisan-output', 'U moet administratorrechten hebben om deze functie te gebruiken!');
        }

        Artisan::call('migrate', ['--force' => true]);

        return redirect()->route('maintenance')->with('artisan-output', Artisan::output());
    }

    public function DBMigrateFresh()
    {
        if (auth()->user()->name !== env('INITIAL_USER_NAME')) {
            return back()->with('artisan-output', 'U moet administratorrechten hebben om deze functie te gebruiken!');
        }

        Artisan::call('migrate:fresh', ['--force' => true]);

        return redirect()->route('maintenance')->with('artisan-output', Artisan::output());
    }
}
