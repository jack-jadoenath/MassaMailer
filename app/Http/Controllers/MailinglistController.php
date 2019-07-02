<?php

namespace App\Http\Controllers;

use App\Mailinglist;
use App\Recipient;
use App\MailinglistRecipients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\StoreMailinglistRequest;

class MailinglistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mailinglists = Mailinglist::all();

        return view('mailinglist.index', compact('mailinglists'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mailinglist.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMailinglistRequest $request)
    {
        $validated = $request->validated();

        $mailinglist = new Mailinglist();
        $recipient = new Recipient();
        $mailinglistRecipient = new MailinglistRecipients();

        $recipient->firstname = $request->recipients_firstname;
        $recipient->lastname = $request->recipients_lastname;
        $recipient->email = $request->recipients_email;
        $recipient->save();

        $mailinglist->name = $request->name;
        $mailinglist->users_id = Auth::user()->id;

        $mailinglist->save();

        $mailinglistRecipient->mailinglists_id = $mailinglist->id;
        $mailinglistRecipient->recipients_id = $recipient->id;
        $mailinglistRecipient->save();

        return redirect()->route('mailinglist.index')->with('message', 'Mailinglijst aangemaakt!');
    }

    /**
     * Display the specified resource.
     * !!!!!
     * !!!!
     * !!!!
     * HEY GA VERDER MET HIER ALLES BENEDEN!!!
     * !!!!
     * !!!!
     * !!!!!
     * 
     * @param  \App\Mailinglist  $mailinglist
     * @return \Illuminate\Http\Response
     */
    public function show($mailinglist)
    {
        $mailinglist = Mailinglist::findOrFail($mailinglist);
        $recipient = Recipient::findOrFail($mailinglist->recipients_id);

        return view('mailinglist.show', compact('mailinglist', 'recipient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mailinglist  $mailinglist
     * @return \Illuminate\Http\Response
     */
    public function edit(Mailinglist $mailinglist)
    {
        return view('mailinglist.edit', compact('mailinglist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mailinglist  $mailinglist
     * @return \Illuminate\Http\Response
     */
    public function update(StoreMailinglistRequest $request, Mailinglist $mailinglist)
    {
        $mailinglist->name = $request->name;

        $mailinglist->save();

        return redirect()->route('mailinglist.index')->with('message', 'Mailinglijst aangepast!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mailinglist  $mailinglist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mailinglist $mailinglist)
    {
        $mailinglist->delete();
        return redirect()->route('mailinglist.index')->with('message', 'Mailinglist Verwijdert');
    }
}
