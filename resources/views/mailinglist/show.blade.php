@extends('layouts.master')

@section('content')

<title>Mailinglijst</title>

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