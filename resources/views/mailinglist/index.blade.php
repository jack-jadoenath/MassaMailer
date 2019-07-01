@extends('layouts.master')

@section('content')

<title>Mailinglijst</title>

<div class="md-7">
    <h1 class="mt-5">Mailing lijst</h1>

    @if (session('message'))
    <div class="alert alert-success">
        {{session('message')}}
    </div>
    @endif

    <table class="table">
        <thead class="thead">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Naam</th>
                <th scope="col">Informatie</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mailinglists as $mailinglist)
            <tr>
                <td scope="row">{{ $mailinglist->id }}</td>
                <td> {{ $mailinglist->name }} </td>
                <td><a href="{{ route('mailinglist.show',
                                        ['mailinglist' => $mailinglist->id]) }}">Info</td>

            </tr>
            @endforeach
        </tbody>
    </table>

    @endsection