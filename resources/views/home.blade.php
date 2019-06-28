@extends('layouts.master')

@section('content')

@if (session('status'))
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<div class="row">
    <div class="col-md-6">
        <h1>Massa Mailer</h1>
        <p>Massa Mailer is een programma voor bedrijven zodat ze emails kunnen sturen naar meerdere van hun klanten.
            Met verschillende templates is het mogelijk om een persoonlijke touch te geven aan de mails die vertuurd worden
            Massa Mailer geeft de mogelijkheid om meerdere lijsten te creeëren voor verschillende emails voor verschillende doelgroepen.
            Door verschillende pakketten kan is het mogelijk om het berijk van het bedrijf te vergroten naar meerdere klanten.
            Massa Mailer is in het kort de beste tool voor email marketing.
        </p>
    </div>

    <div class="col-md-6">
        <img class="feature-image" src="{{asset('img/mail-desk.png')}}" />
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <img class="feature-image" src="{{asset('img/note.png')}}" />
    </div>

    <div class="col-md-6">
        <h1>What is email marketing?</h1>
        <p>E-mailmarketing is een vorm van direct marketing die e-mail gebruikt om commerciële of fondsenwervende boodschappen naar een doelgroep te sturen.
            In de breedste zin kan elke e-mail die is gestuurd naar een potentiële of huidige klant worden beschouwd als e-mailmarketing, maar deze term wordt normaal gebruikt om te verwijzen naar:
            <li>Het sturen van e-mails met als doel het verbeteren van de relatie van een onderneming met zijn huidige of oude klanten en om klantloyaliteit en herhaal aankopen te vergroten.</li>
            <li>Het sturen van e-mails met als doel om nieuwe klanten te werven of om oude klanten te overtuigen iets onmiddellijk te kopen.</li>
            <li>Toevoegen van reclame in e-mails die door andere bedrijven naar hun klanten worden gestuurd.</li><br>
        Onderzoekers schatten dat Amerikaanse bedrijven meer dan 1.51 miljard dollar uitgeven aan e-mailmarketing in 2011 en dat dit zal groeien tot $2.468 miljard in 2016.
        </p>
    </div>
</div>
@endsection
