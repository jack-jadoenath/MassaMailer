@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-9">

        Mail opstellen

        <form method="POST" action="{{ route('mail.index') }}">
            @method('POST')
            @csrf
            <div class="col-sm-10 form-group row">
                <select>
                    @foreach ($templates as $template)

                    <option name="{{ route('template.show',
                    ['template' => $template->id]) }}">{{$template->name}}</option>
                    @endforeach
                </select>
                <select>
                    @foreach ($mailinglists as $mailinglist)
                    <option name="{{ route('mailinglist.show',
                                        ['mailinglist' => $mailinglist->id]) }}">{{$mailinglist->name}}</option>

                    @endforeach
                </select>
                <div class="col-sm-10 form-group row">
                    <label for="name" class="col-form-label">Onderwerp</label>
                    <input type="text" class="form-control" id="name" placeholder="Onderwerp">
                    <input type="text" class="form-control" id="message" placeholder="Bericht">
                    <div class="form-group row">
                        <button type="submit" class="btn btn-primary">Stuur bericht op</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>

@endsection