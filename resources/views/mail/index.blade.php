@extends('layouts.master')

@section('content')

<title>Mail berichten</title>

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
                <a class="btn btn-primary" href="{{ url('/mail/create') }}">Stel een nieuwe mail op</a>
            </div>
        </div>

        @foreach($mails as $mail)
        <br>
        <div class="card">
            <div class="card-header">
                {{ $mail->name }}

                @if(!empty($mailinglists))
                <select name="mailinglists_id" class="form-control">
                    @foreach ($mailinglists as $mailinglist)
                    <option name="{{$mailinglist->id }}">{{$mailinglist->name}}</option>
                    @endforeach
                </select>
                @else
                <select name="null" type="disabled" class="form-control">
                    <option value="Voeg een maillijst toe!">Voeg een maillijst toe!</option>
                </select>
                @endif

                <a class="btn btn-primary right" href="{{ route('mail.edit', ['mail' => $mail->id]) }}">
                    <i class="fa fa-pencil"></i></a>

                <form method="POST" action="{{ route('mail.destroy', $mail) }}" class="right">
                    {{ method_field('DELETE') }}
                    @csrf
                    <button type="submit" class="btn btn-primary red"><i class="fa fa-minus-circle"></i></button>
                </form>
            </div>
        </div>
        @endforeach

        @endsection