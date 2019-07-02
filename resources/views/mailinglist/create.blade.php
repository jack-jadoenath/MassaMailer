@extends('layouts.master')

@section('content')

<title>Maak een mailinglist</title>

<div class="md-7">
    <h1 class="mt-5">Voeg een Mailing lijst toe</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors-all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif



    <form method="post" action="{{route('mailinglist.store')}}" enctype="multipart/form-data">
        @method('POST')
        @csrf
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Lijst naam</label>
            <div class="col-sm-10">
                <input name="name" type="text" class="form-control" id="name" placeholder="Lijst naam">
            </div>
    </form>

    <form method="post" action="{{route('recipient.store')}}" enctype="multipart/form-data">
        <label for="email" class="col-sm-1 col-form-label">Email</label>
        <div class="col-sm-3">
            <input name="recipients_email" type="text" class="form-control" id="email" placeholder="Email">
        </div>
        <label for="email" class="col-sm-1 col-form-label">Voornaam</label>
        <div class="col-sm-3">
            <input name="recipients_firstname" type="text" class="form-control" id="firstname" placeholder="Voornaam">
        </div>
        <label for="email" class="col-sm-1 col-form-label">Achternaam</label>
        <div class="col-sm-3">
            <input name="recipients_lastname" type="text" class="form-control" id="lastname" placeholder="Achternaam">
        </div>
    </form>

</div>
<div class="form-group row">
    <div class="offset-sm-3 col-sm-9">
        <button type="submit" class="btn btn-primary">Voeg Mailinglijst toe</button>
    </div>

</div>

@endsection