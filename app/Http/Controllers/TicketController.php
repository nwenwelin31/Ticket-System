<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Category;
use App\Models\Label;
use App\Models\CategoryTicket;
use App\Models\LabelTicket;
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
        $tickets = Ticket::all();
        return view('ticket.index',compact('tickets'));
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
        $ticket->priority = $request->priority;

        // Handle file uploads
        $file = $request->file('file');
        $newName = "file_".uniqid().".".$file->extension();
        $file->storeAs('public/uploads', $newName);
        $ticket->file = $newName;
        $ticket->save();

        // foreach($request->file('file') as $file)
        // {
        //     $newName = "file_".uniqid().".".$file->getClientOriginalExtension();
        //     $file->storeAs('public/uploads', $newName);
        //     $ticket->files()->create([
        //         'file' => $newName
        //     ]);
        // }


        //$ticket->file = implode(',',$newName);
        //$ticket->save();

        // Store label IDs and ticket id in to label_tickets table
        $labelData = $request->input('label_id', []);
         foreach($labelData as $labelId)
         {
            $labelTicket = new labelTicket();
            $labelTicket->ticket_id = $ticket->id;
            $labelTicket->label_id = $labelId;
            $labelTicket->save();
         }

        // Store category IDs and ticket id in to category_tickets table
         $categoryData = $request->input('category_id', []);
         foreach($categoryData as $categoryId)
         {
            $categoryTicket = new CategoryTicket();
            $categoryTicket->ticket_id = $ticket->id;
            $categoryTicket->category_id = $categoryId;
            $categoryTicket->save();
         }
         return redirect()->route('ticket.index');
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
