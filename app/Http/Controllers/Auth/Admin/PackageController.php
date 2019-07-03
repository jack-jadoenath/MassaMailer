<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Package;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

use App\Http\Requests\StorePackageRequest;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $packets = Package::all();

        return view('auth.admin.packets.index', compact('packets'));
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
    public function store(StorePackageRequest $request)
    {
        //
        $package = new Package();
        $package->name = $request->name;
        $package->limitlist = $request->limitlist;
        $package->limitmails = $request->limitmails;
        $package->limittemplates = $request->limittemplates;
        $package->price = $request->price;
        $package->save();

        return redirect()->route('packets.index')->with('message', 'pakket is toegevoegd.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function edit($package)
    {
        //
        $package = Package::findOrFail($package);
        return view('auth.admin.packets.edit', compact('package'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function update(StorePackageRequest $request, $package)
    {
        //
        $package = Package::findOrFail($package);
        $package->name = $request->name;
        $package->limitlist = $request->limitlist;
        $package->limitmails = $request->limitmails;
        $package->limittemplates = $request->limittemplates;
        $package->price = $request->price;
        $package->save();

        return redirect()->route('packets.index')->with('message', 'pakket is Bijgewerkt.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy($package)
    {
        //
        $package = Package::FindOrFail($package);
        $package->delete();
        return redirect()->route('packets.index')->with('message', 'Pakket is succesvol verwijderd!');
    }

    public function select(Request $request){
        if(Auth::check()){
            return redirect()->route('account.index')->with('message', 'Pakket is succesvol geselecteerd!');
        }
        return redirect()->route('register')->with('packet', $request->id);
    }
}
