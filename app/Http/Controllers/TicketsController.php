<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//To use ticket form
use App\Http\Requests\TicketFormRequest;
//To use ticket class
use App\Ticket;

class TicketsController extends Controller
{
    //
    public function __construct(){
	$this->middleware('auth')->except('index','show');
	}

    public function index(){
    	return view('tickets.index',['tickets' => Ticket::latest()->paginate()]);
    }

    public function show(Ticket $ticket){
    	$comments = $ticket->comments()->get();
		return view('tickets.show',['ticket'=> $ticket,'comments'=>$comments]);
	}

    public function create(){    	
    	return view('tickets.create',['ticket'=>new Ticket]);
	}

	public function store(TicketFormRequest $request)
	{	
		Ticket::create(array(
			'title' => $request->get('title'),
			'content' => $request->get('content'),
			'slug' => password_hash(uniqid(),PASSWORD_BCRYPT),
			'user_id' => $request->get('user_id')
		));
  
		return redirect()->route('tickets.index')->with('status','Ticket was created successfully!');
	}

	public function edit(Ticket $ticket){
	return view('tickets.edit',['ticket'=> $ticket]);
	}

	public function update(Ticket $ticket, TicketFormRequest $request){
		if($request->get('status') != null) {
			$ticket->status = 0;
			} else {
			$ticket->status = 1;
			}
		$ticket->update($request->validated());
		return back()->with('status','Ticket: '.$ticket->slug.' has been updated successfully!');
	}

	public function destroy(Ticket $ticket){
	$ticket->delete();
	return redirect()->route('tickets.index')->with('status','Ticket: '.$ticket->slug.' was deleted successfully!');

	}
}