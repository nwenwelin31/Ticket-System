<?php

namespace App\Http\Controllers;

use App\Models\LabelTicket;
use App\Http\Requests\StoreLabelTicketRequest;
use App\Http\Requests\UpdateLabelTicketRequest;

class LabelTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLabelTicketRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLabelTicketRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LabelTicket  $labelTicket
     * @return \Illuminate\Http\Response
     */
    public function show(LabelTicket $labelTicket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LabelTicket  $labelTicket
     * @return \Illuminate\Http\Response
     */
    public function edit(LabelTicket $labelTicket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLabelTicketRequest  $request
     * @param  \App\Models\LabelTicket  $labelTicket
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLabelTicketRequest $request, LabelTicket $labelTicket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LabelTicket  $labelTicket
     * @return \Illuminate\Http\Response
     */
    public function destroy(LabelTicket $labelTicket)
    {
        //
    }
}
