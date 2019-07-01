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
        <p class="card-text">Array met recipients</p>
    </div>

</div>
@endsection