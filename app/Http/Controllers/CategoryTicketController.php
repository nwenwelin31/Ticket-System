<?php

namespace App\Http\Controllers;

use App\Models\CategoryTicket;
use App\Http\Requests\StoreCategoryTicketRequest;
use App\Http\Requests\UpdateCategoryTicketRequest;

class CategoryTicketController extends Controller
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
     * @param  \App\Http\Requests\StoreCategoryTicketRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryTicketRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryTicket  $categoryTicket
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryTicket $categoryTicket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryTicket  $categoryTicket
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryTicket $categoryTicket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryTicketRequest  $request
     * @param  \App\Models\CategoryTicket  $categoryTicket
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryTicketRequest $request, CategoryTicket $categoryTicket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryTicket  $categoryTicket
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryTicket $categoryTicket)
    {
        //
    }
}
