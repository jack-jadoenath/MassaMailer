<?php

namespace App\Http\Controllers;

use App\Recipient;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Redirect;
use App\MailinglistRecipients;
use App\Mailinglist;
use Auth;

class RecipientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('mailinglist.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect()->route('mailinglist.index', compact('$recipients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $recipient = new Recipient();
        $mailinglistrecipients = new MailinglistRecipients();
        //$insertMailinglist = Mailinglist::create($mailinglistData);


        $recipient->email = $request->email;
        $recipient->firstname = $request->firstname;
        $recipient->lastname = $request->lastname;

        $recipient->save();

        $mailinglistrecipients->mailinglists_id = $request->id;
        $mailinglistrecipients->recipients_id = $recipient->id;

        //$mailinglistData = Mailinglist::find($mailinglists_id)->getMailinglist;

        //$mailinglistrecipients = MailinglistRecipients::create($mailinglistData);

        $mailinglistrecipients->save();




        return redirect()->route('mailinglist.index')->with('message', 'Ontvanger aangemaakt!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Recipient  $recipient
     * @return \Illuminate\Http\Response
     */
    public function show(Recipient $recipient)
    {

        //$recipient = Mailinglist::findOrFail($recipient);

        //return view('mailinglist.show', compact('mailinglist'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recipient  $recipient
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipient $recipient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recipient  $recipient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recipient $recipient)
    {
        $recipient->email = $request->email;
        $recipient->firstname = $request->firstname;
        $recipient->lastname = $request->lastname;
        $recipient->save();
        return redirect()->route('mailinglist.edit')->with('message', 'Ontvanger aangepast!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recipient  $recipient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipient $recipient)
    {
        //
    }
}
