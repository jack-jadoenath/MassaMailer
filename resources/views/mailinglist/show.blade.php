@extends('layouts.master')

@section('title')
    MassaMailer - List
@endsection

@section('content')

<title>Mailinglijst</title>

<div class="form-group row mb-0">
    <div class="col-md-8">
        <a class="btn btn-primary" href="{{ route('mailinglist.edit', ['mailinglist' => $mailinglist->id]) }}">Pas deze lijst aan</a>
    </div>
</div>
<div class="row">
    <div class="filler"></div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h2 class="class-title">{{ $mailinglist->name }}</h2>
            </div>
            <div class="card-body">
                @if(empty($recipients))
                    <div class="card">
                        <div class="card-header">
                            Geen ontvangers gevonden.
                        </div>
                    </div>
                @else
                    @foreach($recipients as $recipient)
                            {{ $recipient->firstname }} {{ $recipient->lastname }}
                            <br>
                            {{ $recipient->email }}
                            <br>
                            <br>
                    @endforeach
                    </table>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-6">
        Welkom bij jouw mailing list.<br><br>
        Hierzo zijn alle recipients van de mailinglist in te zien. Druk op "pas deze lijst aan" om recipients aan te passen/toe te voegen.
    </div>
</div>
@endsection
