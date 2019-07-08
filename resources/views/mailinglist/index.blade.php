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
                    href="{{ route('mailinglist.show', ['mailinglist' => $mailinglist->id]) }}">
                    <i class="fa fa-address-book"></i></a>

                <a class="btn btn-primary right"
                    href="{{ route('mailinglist.edit', ['mailinglist' => $mailinglist->id]) }}">
                    <i class="fa fa-pencil"></i></a>

                <form method="POST" action="{{ route('mailinglist.destroy', $mailinglist) }}" class="right">
                    {{ method_field('DELETE') }}
                    @csrf
                    <button type="submit" class="btn btn-primary red"><i class="fa fa-minus-circle"></i></button>
                </form>
            </div>
        </div>
        @endforeach

        @endsection