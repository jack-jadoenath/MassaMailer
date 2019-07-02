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
        Mailinglijst
    </div>
    <div class="card-body">
        <h2 class="class-title">{{ $mailinglist->name }}</h2>
        @foreach($recipients as $recipient)
        <p class="card-text">{{ $recipient->email }}</p>
        <p class="card-text">{{ $recipient->firstname }}</p>
        <p class="card-text">{{ $recipient->lastname }}</p>

        @endforeach

    </div>

</div>
@endsection