@extends('layouts.master')

@section('content')

<title>Mailinglist aanpassen</title>

<div class="md-7">
    <h1 class="mt-5">Pas deze mailinglist aan</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="post" action="{{route('mailinglist.update', $mailinglist)}}" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="form-group row">

            <table class="col-sm-12">
                <thead>
                    <th><label for="name" class="col-form-label">Lijst naam</label></th>
                </thead>
                <tbody>
                    <td>
                        <input name="name" type="text" class="form-control" id="name"
                            placeholder="{{ $mailinglist->name }}" value="{{ $mailinglist->name }}"></td>
                </tbody>
            </table>
        </div>
        <div class="">
            <button type="submit" class="btn btn-primary">Update Mailinglijst Naam</button>
        </div>
    </form>


    <form method="post" action="{{route('recipient.store')}}" enctype="multipart/form-data">
        @method('POST')
        @csrf
        <div class="form-group row">



            <table class="col-md-12">
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
                </tbody>
            </table>
        </div>
        <div class="">
            <button type="submit" class="btn btn-primary">Maak nieuwe ontvanger aan</button>
        </div>
    </form>

    @if(!empty($recipients))
    @foreach ($recipients as $recipient)
    <form method="post" action="{{route('recipient.update', $recipient)}}" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="form-group row">
            <table class="col-md-12">

                <thead>
                    <th></th>
                    <th><label for="email" class="col-form-label">Email</label></th>
                    <th><label for="firstname" class="col-form-label">Voornaam</label></th>
                    <th><label for="last" class="col-form-label">Achternaam</label>
                    </th>
                </thead>
                <tbody>
                    <td><input type="hidden" name="id" value="{{ $recipient->id }}"></td>
                    <td><input name="email" type="text" class="form-control" id="email" value="{{ $recipient->email }}"
                            placeholder="Vul Email in"></td>
                    <td><input name="firstname" type="text" class="form-control" id="firstname"
                            value="{{ $recipient->firstname }}" placeholder="Vul Voornaam in"></td>
                    <td><input name="lastname" type="text" class="form-control" id="lastname"
                            value="{{ $recipient->lastname }}" placeholder="Vul Achternaam in"></td>
                </tbody>
            </table>
        </div>
        <div class="">
            <button type="submit" class="btn btn-primary">Update ontvanger</button>
        </div>
    </form>
    @endforeach
    @endif



</div>

@endsection