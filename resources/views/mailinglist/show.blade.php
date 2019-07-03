@extends('layouts.master')

@section('content')

<title>Mailinglijst</title>
<nav class="nav">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/mailinglist/'.$mailinglist->id.'/edit') }}">Pas deze lijst aan</a>
        </li>
    </ul>
</nav>



<div class="card">
    <div class="card-header">
        Mailinglijst <h2 class="class-title">{{ $mailinglist->name }}</h2>
    </div>
    <div class="card-body">

        @foreach($recipients as $recipient)

        <ul class="card-text">{{ $recipient->email }}
            <li class="card-text">{{ $recipient->firstname }}</li>
            <li class="card-text">{{ $recipient->lastname }}</li>
        </ul>
        @endforeach

    </div>

</div>
@endsection