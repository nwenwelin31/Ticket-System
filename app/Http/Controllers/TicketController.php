<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Category;
use App\Models\Label;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ticket.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $labels = Label::all();
        return view('ticket.create',compact(['categories','labels']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTicketRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTicketRequest $request)
    {
        $ticket = new Ticket();
        $ticket->title = $request->title;
        $ticket->message = $request->message;
        // $labelData = $request->input('label_id', []);
        // $ticket->label_id = implode(', ', $labelData);
        // $categoryData = $request->input('category_id', []);
        // $ticket->category_id = implode(', ', $categoryData);
        // Store category IDs
        $categoryIds = $request->input('category_id', []);
        $ticket->category()->sync($categoryIds); // Assuming 'categories' is the relationship method

        // Store label IDs
        $labelIds = $request->input('label_id', []);
        $ticket->label()->sync($labelIds); // Assuming 'labels' is the relationship method

        $ticket->priority = $request->priority;

        // Handle file uploads
        $file = $request->file('file');
        $newName = "file_".uniqid().".".$file->extension();
        $file->storeAs('public/uploads', $newName);
        $ticket->file = $newName;

        $ticket->save();
        return 'hello';

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTicketRequest  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
