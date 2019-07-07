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

        $mails = Mail::all();

        return view('mail.index', compact('mail', 'templates', 'mailinglists'));
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
        $mailinglists = Mailinglist::where('users_id', '=', Auth::id())->get();

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

        $user = User::FindOrFail(Auth::id());
        $mail->name = $request->name;
        $mail->message = $request->message;
        $mail->users_id = Auth::user()->id;
        $mail->templates_id = $request->templates;
        $mail->save();
        return redirect()->route('mail.index')->with('message', 'Bericht opgestuurd naar uw ontvangers!');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mail  $mail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mail $mail)
    {
        //
    }
}
