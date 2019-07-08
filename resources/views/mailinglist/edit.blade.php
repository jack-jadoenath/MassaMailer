@extends('layouts.master')

@section('content')

<title>Mailinglist aanpassen</title>

<h1>Pas deze mailinglist aan</h1>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
<!-- edit list name -->
<div class="row">
    <form method="post" action="{{route('mailinglist.update', $mailinglist)}}" enctype="multipart/form-data" class="col-md-6">
        @method('PATCH')
        @csrf
        <label for="name" class="col-form-label">Lijst naam</label>
        <input name="name" type="text" class="form-control" id="name"
            placeholder="{{ $mailinglist->name }}" value="{{ $mailinglist->name }}">
        <br>
        <button type="submit" class="btn btn-primary">Update Mailinglijst Naam</button>
    </form>
    <div class="col-md-6">
        Welkom bij mailing lijst edit pagina.<br><br>
        Hier kan de lijst naam aangepast worden. Ook kunnen hier nieuwe ontvangers toe gevoegd worden, maar ook bestaande ontvangers aangepast worden.
    </div>
</div>

<div class="row">
    <div class="filler"></div>
</div>
<div class="row">
    <div class="filler"></div>
</div>

<!-- add recipient -->
<div class="row">
    <form method="post" action="{{route('recipient.store')}}" enctype="multipart/form-data" class="col-md-12">
        <h1>voeg een ontvanger toe</h1>
        @method('POST')
        @csrf
        <table>
            <thead>
                <th><label for="email" class="col-form-label">Email</label></th>
                <th><label for="firstname" class="col-form-label">Voornaam</label></th>
                <th><label for="last" class="col-form-label">Achternaam</label>
                </th>
            </thead>
            <tbody>

                <td><input name="email" type="text" class="form-control" id="email" placeholder="Nieuwe Email"></td>
                <td><input name="firstname" type="text" class="form-control" id="firstname"
                        placeholder="Nieuwe Voornaam "></td>
                <td><input name="lastname" type="text" class="form-control" id="lastname"
                        placeholder="Nieuwe Achternaam"></td>
                    <input name="id" type="text" class="form-control" id="id"
                    hidden value="{{ $mailinglist->id }}">
            </tbody>
        </table>
        <br>
        <div class="">
            <button type="submit" class="btn btn-primary">Maak nieuwe ontvanger aan</button>
        </div>
    </form>
</div>

<div class="row">
    <div class="filler"></div>
</div>
<div class="row">
    <div class="filler"></div>
</div>

<!-- edit recipients -->
@if(!empty($recipients))
    <div class="row">
        <div class="col-md-12">
            <h1>pas ontvangers aan</h1>
            @foreach ($recipients as $recipient)
                <form method="post" action="{{route('recipient.update', $recipient)}}" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <table style="width: 100%;">
                        <thead>
                            <th><label class="col-form-label" for="email">Email</label></th>
                            <th><label for="firstname" class="col-form-label">Voornaam</label></th>
                            <th><label for="last" class="col-form-label">Achternaam</label></th>
                        </thead>
                        <tbody>
                            <input type="hidden" name="id" value="{{ $recipient->id }}">
                            <td><input name="email" type="text" class="form-control" id="email" value="{{ $recipient->email }}"
                                    placeholder="Vul Email in"></td>
                            <td><input name="firstname" type="text" class="form-control" id="firstname"
                                    value="{{ $recipient->firstname }}" placeholder="Vul Voornaam in"></td>
                            <td><input name="lastname" type="text" class="form-control" id="lastname"
                                    value="{{ $recipient->lastname }}" placeholder="Vul Achternaam in"></td>
                        </tbody>
                    </table>
                    <div class="">
                        <button type="submit" class="btn btn-primary">Update ontvanger</button>
                    </div>
                </form>
            @endforeach
        </div>
    </div>
@endif
@endsection
