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

    <nav class="nav">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/mailinglist/create') }}">Maak lijst</a>
            </li>

        </ul>
    </nav>

    <table class="table">
        <thead class="thead">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Naam</th>
                <th scope="col">Informatie</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($mailinglists as $mailinglist)
            <tr>
                <td scope="row">{{ $mailinglist->id }}</td>
                <td> {{ $mailinglist->name }} </td>
                <td><a href="{{ route('mailinglist.show',
                                        ['mailinglist' => $mailinglist->id]) }}">Info</a></td>
                <td>
                    <form method="POST" action="{{ route('mailinglist.destroy', $mailinglist) }}">
                        {{ method_field('DELETE') }}
                        @csrf
                        <button type="submit" class="btn">Verwijder</button> </form>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>

    @endsection