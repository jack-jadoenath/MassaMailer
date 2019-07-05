<?php

namespace App\Http\Controllers;

use App\Template;
use App\Footer;
use App\Header;
use App\User;
use App\Package;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTemplateRequest;
use App\Http\Requests\UpdateTemplateRequest;
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

        $user = User::FindOrFail(Auth::id());
        $templates = $user->template()->get();
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
        $user = User::FindOrFail(Auth::id());
        $templatesCount = count($user->template()->get());
        $packet = Package::FindOrFail($user->packages_id);

        if($templatesCount >= $packet->limittemplates){
            return redirect()->route('templates.index')->with('message', 'U heeft uw Template Limiet al berijkt, om een nieuwe Template te maken dient u een oude te verwijderen of een hogere pakket te kiezen.');
        }

        //
        $footer = new Footer();
        $header = new Header();

        $footer->save();
        $header->save();


        $template = new Template();
        $template->name = $request->name;
        $template->user_id = Auth::id();
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
        $footer = Footer::findOrFail($template->footers_id);
        $header = Header::findOrFail($template->headers_id);
        return view('templates.edit', compact('template', 'footer', 'header'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTemplateRequest $request, Template $template)
    {
        //
        $footer = Footer::findOrFail($template->footers_id);
        $header = Header::findOrFail($template->headers_id);
        
        $template->name = $request->name;

        $header->size = $request->header_size;
        $header->color = $request->header_color;
        $header->fontsize = $request->header_fontsize;
        $header->fontcolor = $request->header_fontcolor;

        $footer->size = $request->footer_size;
        $footer->color = $request->footer_color;
        $footer->fontsize = $request->footer_fontsize;
        $footer->fontcolor = $request->footer_fontcolor;

        $template->save();
        $footer->save();
        $header->save();

        return redirect()->route('templates.index')->with('message', 'Template is Bijgewerkt.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function destroy(Template $template)
    {
        //
        $footer = Footer::findOrFail($template->footers_id);
        $header = Header::findOrFail($template->headers_id);

        $template->delete();
        $footer->delete();
        $header->delete();

        return redirect()->route('templates.index')->with('message', 'Template is verwijderd.');
    }
}
