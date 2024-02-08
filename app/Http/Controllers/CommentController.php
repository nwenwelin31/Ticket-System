<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Ticket;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
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

        //return view('comment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommentRequest $request)
    {
        $comment = new Comment();
        $comment->name = $request->name;
        $comment->user_id = Auth::user()->id;
        $comment->ticket_id =$request->ticket_id;
        $comment->save();
        $ticket = Ticket::find($request->ticket_id);
        $comments = $ticket->comment;
        $isEditing=false;
        return redirect()->route('ticket.show',compact('comments','ticket'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment,$id)
    {
        $ticket = Ticket::find($id);
        $comments = $ticket->comment;
        return $comments;
        //return view('comment.show',compact('comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        $isEditing = true; // Set this to true if editing, false if creating
        return view('comment.edit',compact('comment','isEditing'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCommentRequest  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        $comment->name = $request->name;
        $comment->user_id = Auth::user()->id;
        $comment->ticket_id =$request->ticket_id;
        $comment->update();
        return view('ticket.detail');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        if($comment->id){
            $comment->delete();
        }
        return redirect()->route('ticket.show');

    }
}
