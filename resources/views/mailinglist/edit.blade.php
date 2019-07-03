@extends('layouts.master')

@section('content')

<title>Mailinglist aanpassen</title>

<div class="md-7">
    <h1 class="mt-5">Pas deze mailinglist aan</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors-all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif



    <form method="post" action="{{route('mailinglist.update', $mailinglist)}}" enctype="multipart/form-data">
        @method('PATCH')

        @csrf
        <div class="form-group row">
            <label for="name" class="col-sm-3 col-form-label">Lijst naam</label>
            <div class="col-sm-9">
                <input name="name" type="text" class="form-control" id="name" placeholder="{{ $mailinglist->name }}">
            </div>

            <div class="col-sm-4">
                <label for="email" class="col-form-label">Email</label>
                <input name="recipients_email" type="text" class="form-control" id="email" placeholder="Nieuwe Email">
            </div>

            <div class="col-sm-4">
                <label for="email" class="col-form-label">Voornaam</label>
                <input name="recipients_firstname" type="text" class="form-control" id="firstname"
                    placeholder="Nieuwe Voornaam ">
            </div>

            <div class="col-sm-4">
                <label for="email" class="col-form-label">Achternaam</label>
                <input name="recipients_lastname" type="text" class="form-control" id="lastname"
                    placeholder="Nieuwe Achternaam">
            </div>

            @foreach ($recipients as $recipient)

            <div class="col-sm-4">
                <label for="email" class="col-form-label">Email</label>
                <input name="{{ $recipient->id }}recipients_email" type="text" class="form-control" id="email"
                    value="{{ $recipient->email }}" placeholder="Vul Email in">
            </div>

            <div class="col-sm-4">
                <label for="email" class="col-form-label">Voornaam</label>
                <input name="{{ $recipient->id }}recipients_firstname" type="text" class="form-control" id="firstname"
                    value="{{ $recipient->firstname }}" placeholder="Vul Voornaam in">
            </div>

            <div class="col-sm-4">
                <label for="email" class="col-form-label">Achternaam</label>
                <input name="{{ $recipient->id }}recipients_lastname" type="text" class="form-control" id="lastname"
                    value="{{ $recipient->lastname }}" placeholder="Vul Achternaam in">
            </div>

            @endforeach

        </div>
        <div class="form-group row">
            <div class="offset-sm-3 col-sm-9">
                <button type="submit" class="btn btn-primary">Update Mailinglijst Aan</button>
            </div>
    </form>
</div>

@endsection