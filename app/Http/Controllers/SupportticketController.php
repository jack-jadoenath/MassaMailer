<?php

namespace App\Http\Controllers;

use App\Supportticket;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSupportticketRequest;
use App\Http\Requests\UpdateSupportticketRequest;
use Auth;
use Carbon\Carbon;

class SupportticketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

        if (Auth::check())
        {
            $user = User::FindOrFail(Auth::id());
            $supporttickets = $user->supportticket()->get()->sortBy('status');
            
            return view('support.index', compact('supporttickets'));
        }else{
            return view('support.index');
        }
       

        
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSupportticketRequest $request)
    {
        //
        $supportticket = new Supportticket();
        $supportticket->user_id = Auth::id();
        $supportticket->question = $request->question;
        $supportticket->message = $request->message;
        $supportticket->date = Carbon::now();
        $supportticket->status = 0;
        $supportticket->save();

        return redirect()->route('contact.index')->with('message', 'Uw tickets is succesvol aangemaakt.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supportticket  $supportticket
     * @return \Illuminate\Http\Response
     */
    public function show(Supportticket $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supportticket  $supportticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Supportticket $contact)
    {
        //
        return view('support.edit', compact('contact'))->with('message', 'Uw tickets is succesvol aangemaakt.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supportticket  $supportticket
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSupportticketRequest $request, Supportticket $contact)
    {
        //
        $contact->question = $request->question;
        $contact->message = $request->message;
        $contact->save();

        return redirect()->route('contact.index')->with('message', 'Support Ticket is succesvol Bewerkt');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supportticket  $supportticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supportticket $contact)
    {
        //
        $contact->status = 2;
        $contact->save();
        return redirect()->route('contact.index')->with('message', 'Ticket is succesvol Gesloten.');
    }
}
