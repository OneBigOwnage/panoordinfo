<?php

namespace App\Http\Controllers;

use App\AgendaItem;
use App\Http\Resources\AgendaItemResource;
use Illuminate\Http\Request;

class ScreenController extends Controller
{
    public function default()
    {
        return view('screen');
    }

    public function agendaItems()
    {
        return tap(AgendaItemResource::collection(AgendaItem::all()))->withoutWrapping();
    }
}
