@extends('layouts.master')

@section('content')
        
        @if($packets != null && count($packets) > 0)
            <form method="POST" action="{{ route('contact.update', $supportticket) }}" style="width: 100%;" >
            @csrf
            <div class="row">
            @foreach($packets as $packet)
            <br>
            <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    {{ $packet->name }}
                </div>
                <div class="card-body">
                    <p>Email Lijsten:  {{ $packet->limitlist }}</p>
                    <p>Emails Versturen:  {{ $packet->limitmails }}</p>
                    <p>Email Templates:  {{ $packet->limittemplates }}</p>
                    <p>Prijs:  {{ $packet->price }}</p>
                    <button type="submit" class="btn btn-primary">Kies Pakket</button>
                </div>
            </div>
            </div>
            @endforeach
            </form>
            </div>
        @else
            <br>
            <div class="card">
                <div class="card-header">
                    Geen Pakketten gevonden.
                </div> 
            </div>
        @endif
        

@endsection
