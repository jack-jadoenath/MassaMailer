<?php

namespace App\Http\Controllers\Auth\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Supportticket;
use App\Http\Requests\AnswerSupportticketRequest;
use App\Http\Requests\UpdateSupportticketRequest;
use Auth;
use Carbon\Carbon;

class SupportController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Supportticket::where('status', '!=', 2)->orderBy('status', 'asc')->orderBy('date', 'asc')->get();

        return view('auth.admin.support.index', compact('tickets'));
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
        return view('auth.admin.support.edit', compact('supportticket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supportticket  $supportticket
     * @return \Illuminate\Http\Response
     */
    public function update(AnswerSupportticketRequest $request, $supportticket)
    {
        //
        $supportticket = Supportticket::findOrFail($supportticket);
        $supportticket->answer = $request->answer;
        $supportticket->status = 1;
        $supportticket->save();

        return redirect()->route('support.index')->with('message', 'Support Ticket is succesvol Beantwoord');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supportticket  $supportticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supportticket $supportticket)
    {
        //
        $supportticket->delete();
        return redirect()->route('support.index')->with('message', 'Ticket is succesvol verwijder.');
    }
}
