<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
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
        return view('customer.ticket.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate input
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'priority' => 'required',
            'status' => 'required',
            'category_id' => 'requiured',
            'label_id' => 'required',
            'attachements' => 'mimes:jpg,png|max:2048',
            ], 
        [
        'category_id' => 'select category',
        'label_id' => 'select label']);

        $ticket = new Ticket();
        $ticket->title = $request->title;
        $ticket->description = $request->description;
        $ticket->priority = $request->prority;
        $ticket->status = $request->status;
        if($request->hasFile('attachements')){
            $fileName = time(). '.'.$request->attachements->extension();
         $ticket->attachements = $fileName;
        }
        $saveTicket = $ticket->save();
        if($saveTicket){
            $request->attachements->move(public_path('attachements'), $fileName);
            $lastTicketId = $ticket->id;
            $lastTicketId->category()->attach($request->category_id);
            $lastTicketId->category()->attach($request->category_id);
            
        }




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
