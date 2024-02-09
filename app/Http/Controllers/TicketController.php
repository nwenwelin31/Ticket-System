<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Category;
use App\Models\Label;
use App\Models\User;
use App\Models\Comment;
use App\Models\CategoryTicket;
use App\Models\LabelTicket;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role == "0")
        {
            $tickets = Ticket::all();
        }
        else if(Auth::user()->role == "1")
        {
            $tickets = Ticket::where('user_id',Auth::user()->id)->orWhere('agent_id',Auth::user()->id)->get();
        }
        else
        {
            $tickets = Ticket::where('user_id',Auth::user()->id)->get();
        }
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
        $request->validate([
                'title' => 'required|string|max:255',
                'message' => 'required|string',
                'category_id' => 'required',
                'label_id' => 'required',
                'priority' => 'required|string|max:255',
                'file.*' => 'nullable|file|max:10240', // Assuming maximum file size of 10 MB
        ]);

        $ticket = new Ticket();
        $ticket->title = $request->title;
        $ticket->message = $request->message;
        $ticket->priority = $request->priority;
        $ticket->status = 1;//status open
        $ticket->user_id = Auth::user()->id;//login user id
        // Handle file uploads
        $files = $request->file('file');
        $uploadedFiles = [];
            foreach($files as $file)
            {
                if($files)
                {
                    $fileName = "file_".uniqid().".".$file->extension();
                    $file->storeAs('public/uploads', $fileName);
                    $uploadedFiles[] =$fileName;
                }
            }

        $ticket->file = implode(",",$uploadedFiles);
        $ticket->save();

        // Store label IDs and ticket id in to label_tickets table
        if($request->category_id)
        {
            $ticket->category()->attach($request->category_id);
        }

        //Store category IDs and ticket id in to category_tickets table
        if($request->label_id)
        {
            $ticket->label()->attach($request->label_id);
        }
        return redirect()->route('ticket.index')->with('store','Ticket is created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        $comments = $ticket->comment;
        return view('ticket.show',compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        $categories = Category::all();
        $labels = Label::all();
        $agents = User::where('role','1')->get();
        if(Auth::user()->role == "0" || Auth::user()->role == $ticket->agent_id)
        {
            return view('ticket.edit',compact('ticket','categories','labels','agents'));
        }

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
        $ticket->title = $request->title;
        $ticket->message = $request->message;
        $ticket->priority = $request->priority;
        $ticket->status = 1;//status open
        $ticket->user_id = Auth::user()->id;//login user id
        $ticket->agent_id = $request->agent_id;

        // Handle file uploads
        $files = $request->file('file');
        $uploadedFiles = [];
        if($files)
        {
            foreach($files as $file)
            {
                $fileName = "file_".uniqid().".".$file->extension();
                $file->storeAs('public/uploads', $fileName);
                $uploadedFiles[] =$fileName;

            }
        }
        else{
            $uploadedFiles[] = $ticket->file;
        }

        $ticket->file = implode(",",$uploadedFiles);
        $ticket->update();

         // update label IDs and ticket id in to label_tickets table
         if($request->category_id)
         {
             $ticket->category()->sync($request->category_id);
         }

         //update category IDs and ticket id in to category_tickets table
         if($request->label_id)
         {
             $ticket->label()->sync($request->label_id);
         }
         return redirect()->route('ticket.index')->with('update','Ticket is updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        if($ticket->id)
        {
            $ticket->delete();
        }
        return redirect()->back()->with('delete','Ticket is deleted successfully');
    }
}
