@extends('layouts.master')

@section('content')

<title>Maak een mailinglist</title>
<div class="row">
    <div class="col-md-6">
        <h1>Voeg een Mailing lijst toe</h1>

        <form method="post" action="{{route('mailinglist.index')}}" enctype="multipart/form-data">
            @method('POST')
            @csrf
            <input name="name" type="text" class="form-control" id="name" placeholder="Lijst naam">
            <br>
            <button type="submit" class="btn btn-primary">Voeg Mailinglijst toe</button>
        </form>
    </div>
    <div class="col-md-6">
        Welkom op de mailinglist create pagina.<br><br>
        Hier kunnen nieuwe mailing lijsten aangemaakt worden. Om ontvangers toe te voegen moet na het aan maken de lijst, de lijst aangepast worden met de nieuwe mail addressen erbij.
    </div>
</div>


@endsection
