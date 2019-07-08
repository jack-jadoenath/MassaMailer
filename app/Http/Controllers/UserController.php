<?php

namespace App\Http\Controllers;

use App\User;
use App\Package;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateUsersRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $user = User::findOrFail(Auth::id());
        $packet = Package::findOrFail($user->packages_id);
        
        return view('auth.user.index', compact('user', 'packet'));
    }

    /**
     * Show the form for creating a new resource.
     *s
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $account)
    {
        //
        $packets = Package::all();
        
        return view('auth.user.edit', compact('account', 'packets'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsersRequest $request, User $account)
    {
        //
        $account->name = $request->name;
        $account->email = $request->email;
        $account->phone = $request->phone;
        $account->card_last_four = substr($request->card_last_four, -4);
        $account->packages_id = $request->packet;
        $account->save();

        return redirect()->route('account.index')->with('message', 'Gegevens zijn bewerkt.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $account)
    {
        //
    }
}
