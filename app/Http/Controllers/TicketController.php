<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Label;
use App\Models\Priority;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        // $tickets = DB::table('tickets')
        // ->join('category_ticket', 'category_ticket.ticket_id', '=', 'tickets.id')
        // ->join('label_ticket', 'label_ticket.ticket_id', '=', 'tickets.id')
        // ->join('categories', 'categories.id', '=', 'category_ticket.category_id')
        // ->select('tickets.*', 'category_ticket.*', 'label_ticket.*', 'categories.name')
        // ->get();
        // //dd($tickets);
       
        $tickets = Ticket::all();
        return view('customer.ticket.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $labels = Label::all();
        $categories = Category::all();
        $priorities = Priority::all();
        return view('customer.ticket.create', compact('labels', 'categories', 'priorities'));
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
            'category_id' => 'required',
            'label_id' => 'required',
            'attachements' => 'mimes:jpg,png|max:2048',
            ], 
        [
        'category_id.required' => 'select category',
        'label_id.required' => 'select label']);

        $ticket = new Ticket();
        $ticket->title = $request->title;
        $ticket->description = $request->description;
        $ticket->priority = $request->priority;
        $ticket->status = $request->status;
        $ticket->user_id = $request->user_id;

        if($request->hasFile('attachements')){
            $fileName = time(). '.'.$request->attachements->extension();
           $ticket->attachements = $fileName;
           $request->attachements->move(public_path('attachements'), $fileName);
        }
        $saveTicket = $ticket->save();

        if($saveTicket){
            $getLastTicket = Ticket::find($ticket->id);

            foreach($request->category_id as $category_id){
                $getLastTicket->category()->attach($category_id);

            }

            foreach($request->label_id as $label_id){
                $getLastTicket->label()->attach($label_id);

            }
        
            
        }

        return redirect()->route('customer.ticket.index')->with('message', 'Ticket Submited');




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
