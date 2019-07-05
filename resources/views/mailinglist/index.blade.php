@extends('layouts.master')

@section('content')

<title>Mailinglijst</title>

<div class="row">
    <div class="col-md-12">
        @if(session('message'))
        {{ session('message') }}
        <div class="row">
            <div class="filler"></div>
        </div>
        @endif

        <div class="form-group row mb-0">
            <div class="col-md-8">
                <a class="btn btn-primary" href="{{ url('/mailinglist/create') }}">Maak nieuwe lijst</a>
            </div>
        </div>

        @foreach($mailinglists as $mailinglist)
        <br>
        <div class="card">
            <div class="card-header">
                {{ $mailinglist->name }}
                <a class="btn btn-primary right"
                    href="{{ route('mailinglist.show', ['mailinglist' => $mailinglist->id]) }}"><i
                        class="fa fa-pencil"></i></a>
                <form method="POST" action="{{ route('mailinglist.destroy', $mailinglist) }}" class="right">
                    {{ method_field('DELETE') }}
                    @csrf
                    <button type="submit" class="btn btn-primary red"><i class="fa fa-minus-circle"></i></button>
                </form>
            </div>
        </div>
        @endforeach







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
                    <td><a href="{{ route('mailinglist.edit',
                        ['mailinglist' => $mailinglist->id]) }}">Edit</a></td>
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