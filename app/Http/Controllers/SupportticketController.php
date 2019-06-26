<?php

namespace App\Http\Controllers;

use App\Supportticket;
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
            $supporttickets = Supportticket::where('users_id', '=', Auth::id())->get();
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
        $supportticket->users_id = Auth::id();
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
    public function show(Supportticket $supportticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supportticket  $supportticket
     * @return \Illuminate\Http\Response
     */
    public function edit($supportticket)
    {
        //
        //dd(['supportticket' => $supportticket]);
        $supportticket = Supportticket::findOrFail($supportticket);
        return view('support.edit', compact('supportticket'))->with('message', 'Uw tickets is succesvol aangemaakt.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supportticket  $supportticket
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSupportticketRequest $request, $supportticket)
    {
        //
        $supportticket = Supportticket::findOrFail($supportticket);
        $supportticket->question = $request->question;
        $supportticket->message = $request->message;
        $supportticket->save();

        return redirect()->route('contact.index')->with('message', 'Support Ticket is succesvol Bewerkt');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supportticket  $supportticket
     * @return \Illuminate\Http\Response
     */
    public function destroy($supportticket)
    {
        //
        $supportticket = Supportticket::findOrFail($supportticket);
        $supportticket->delete();
        return redirect()->route('contact.index')->with('message', 'Ticket is succesvol verwijder.');
    }
}
