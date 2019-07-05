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
    public function show(Supportticket $support)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supportticket  $supportticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Supportticket $support)
    {
        //
        return view('auth.admin.support.edit', compact('support'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supportticket  $supportticket
     * @return \Illuminate\Http\Response
     */
    public function update(AnswerSupportticketRequest $request, Supportticket $support)
    {
        //
        $support->answer = $request->answer;
        $support->status = 1;
        $support->save();

        return redirect()->route('support.index')->with('message', 'Support Ticket is succesvol Beantwoord');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supportticket  $supportticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supportticket $support)
    {
        //
        $support->delete();
        return redirect()->route('support.index')->with('message', 'Ticket is succesvol verwijder.');
    }
}
