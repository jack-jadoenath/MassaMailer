<?php

namespace App\Http\Controllers;

use App\Mail;
use App\Template;
use App\User;
use Auth;
use Illuminate\Http\Request;
use App\Mailinglist;

class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::FindOrFail(Auth::id());
        $mails = $user->mail()->get();
        $mailinglists = $user->mailinglist()->get();


        return view('mail.index', compact('mails', 'templates', 'mailinglists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $user = User::FindOrFail(Auth::id());
        //$templates = $user->template()->get();
        $mailinglists = Mailinglist::where('user_id', '=', Auth::id())->get();
        $templates = Template::where('user_id', '=', Auth::id())->get();
        return view('mail.create', compact('mail', 'templates', 'mailinglists'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mail = new Mail();
        $mail->name = $request->name;
        $mail->message = $request->message;
        $mail->user_id = Auth::user()->id;
        $mail->templates_id = $request->templates_id;
        $mail->save();
        return redirect()->route('mail.index')->with('message', 'Bericht opgeslagen en gereed om verstuurd te worden!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mail  $mail
     * @return \Illuminate\Http\Response
     */
    public function show(Mail $mail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mail  $mail
     * @return \Illuminate\Http\Response
     */
    public function edit(Mail $mail)
    {

        $templates = Template::where('user_id', '=', Auth::id())->get();

        return view('mail.edit', compact('mail', 'templates', 'mailinglists'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mail  $mail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mail $mail)
    {
        $mail->name = $request->name;
        $mail->message = $request->message;
        $mail->user_id = Auth::user()->id;
        $mail->templates_id = $request->templates_id;
        $mail->save();
        return redirect()->route('mail.index')->with('message', 'Bericht aangepast en gereed om verstuurd te worden!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mail  $mail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mail $mail)
    {
        $mail->delete();

        return redirect()->route('mail.index')->with('message', 'Bericht verwijdert!');
    }
}
