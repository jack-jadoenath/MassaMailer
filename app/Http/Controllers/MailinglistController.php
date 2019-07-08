<?php

namespace App\Http\Controllers;

use App\Mailinglist;
use App\Recipient;
use App\MailinglistRecipients;
use App\User;
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
        $user = User::FindOrFail(Auth::id());

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

        $mailinglist->name = $request->name;
        $mailinglist->users_id = Auth::user()->id;

        $mailinglist->save();

        return redirect()->route('mailinglist.index')->with('message', 'Mailinglijst aangemaakt!');
    }

    /**
     * Display the specified resource.
     * 
     * @param  \App\Mailinglist  $mailinglist
     * @return \Illuminate\Http\Response
     */
    public function show($mailinglist)
    {
        $mailinglist = Mailinglist::findOrFail($mailinglist);



        //$mailinglistRecipients = MailinglistRecipients::findOrFail($mailinglist->id);
        $mailinglistRecipients = MailinglistRecipients::where('mailinglists_id', '=', $mailinglist->id)->get();

        $recipients = [];

        foreach ($mailinglistRecipients as $mailinglistRecipient) {
            $recipients[] = Recipient::findOrFail($mailinglistRecipient->recipients_id);
        }
        return view('mailinglist.show', compact('mailinglist', 'recipients'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mailinglist  $mailinglist
     * @return \Illuminate\Http\Response
     */
    public function edit($mailinglist)
    {
        $mailinglist = Mailinglist::findOrFail($mailinglist);

        $recipients = [];
        $mailinglistRecipients = [];

        
        //$mailinglistRecipients = MailinglistRecipients::findOrFail($mailinglist->id);
        $mailinglistRecipients = MailinglistRecipients::where('mailinglists_id', '=', $mailinglist->id)->get();
        foreach ($mailinglistRecipients as $mailinglistRecipient) {
            $recipients[] = Recipient::findOrFail($mailinglistRecipient->recipients_id);
        }
        return view('mailinglist.edit', compact('mailinglist', 'recipients', 'mailinglistRecipients'));
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

        $mailinglistRecipients = MailinglistRecipients::where('mailinglists_id', '=', $mailinglist->id)->get();

        foreach ($mailinglistRecipients as $mailinglistRecipient) {
            $recipient = Recipient::findOrFail($mailinglistRecipient->recipients_id);
            $recipient->delete();
        }

        $mailinglist->delete();

        return redirect()->route('mailinglist.index')->with('message', 'Mailinglist Verwijdert');
    }
}
