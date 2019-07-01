<?php

namespace App\Http\Controllers;

use App\Template;
use App\Footer;
use App\Header;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTemplateRequest;
use Auth;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $templates = Template::all();
        return view('templates.index', compact('templates'));
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
    public function store(StoreTemplateRequest $request)
    {
        //
        $footer = new Footer();
        $header = new Header();

        $footer->save();
        $header->save();


        $template = new Template();
        $template->name = $request->name;
        $template->users_id = Auth::id();
        $template->footers_id = $footer->id;
        $template->headers_id = $header->id;
       
        $template->save();

        return redirect()->route('templates.index')->with('message', 'Template is aangemaakt.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function show(Template $template)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function edit(Template $template)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Template $template)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function destroy($template)
    {
        //
        $template = Template::findOrFail($template);

        if($template->headers_id == 0 && $template->footers_id == 0){
            // De template heeft nog geen Header of Footer dus deze hoeft ook verwijderd te worden
            $template->delete();
        }else if($template->headers_id == 0){
            // We hebben een Footer
            $footer = Footer::findOrFail($template->footers_id);
            $footer->delete();
            $template->delete();
        }else if($template->footers_id == 0){
            // We hebben een Header
            $header = Header::findOrFail($template->headers_id);
            $header->delete();
            $template->delete();
        }else{
            // We hebben een Footer en een Header
            $footer = Footer::findOrFail($template->footers_id);
            $header = Header::findOrFail($template->headers_id);
            $header->delete();
            $footer->delete();
            $template->delete();
        }
    }
}
