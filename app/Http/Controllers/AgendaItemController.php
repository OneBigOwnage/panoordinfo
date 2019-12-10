<?php

namespace App\Http\Controllers;

use App\AgendaItem;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AgendaItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('agenda-items.index')->with('items', AgendaItem::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agenda-items.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'title'    => 'required'                  ,
            'date'     => 'required|date_format:d-m-Y',
            'contents' => 'required'                  ,
        ]);

        $attributes['date'] = Carbon::createFromFormat('d-m-Y', $attributes['date']);

        AgendaItem::create($attributes);

        return redirect()->route('agenda-items.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AgendaItem  $agendaItem
     * @return \Illuminate\Http\Response
     */
    public function show(AgendaItem $agendaItem)
    {
        return view('agenda-items.show')->with('item', $agendaItem);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AgendaItem  $agendaItem
     * @return \Illuminate\Http\Response
     */
    public function edit(AgendaItem $agendaItem)
    {
        return view('agenda-items.edit')->with('item', $agendaItem);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AgendaItem  $agendaItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AgendaItem $agendaItem)
    {
        $attributes = $request->validate([
            'title'    => 'required'                  ,
            'date'     => 'required|date_format:d-m-Y',
            'contents' => 'required'                  ,
        ]);

        $attributes['date'] = Carbon::createFromFormat('d-m-Y', $attributes['date']);

        $agendaItem->update($attributes);

        return redirect()->route('agenda-items.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AgendaItem  $agendaItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(AgendaItem $agendaItem)
    {
        $agendaItem->delete();

        return redirect()->route('agenda-items.index');
    }
}
