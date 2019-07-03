@extends('layouts.master')

@section('content')
        
        @if($packets != null && count($packets) > 0)
            
            
            <div class="row">
            @foreach($packets as $packet)
            <form method="POST" action="{{ route('packets.select', $packet) }}" class="col-md-4" >
            @csrf
            <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ $packet->name }}
                </div>
                <div class="card-body">
                    <p>Email Lijsten:  {{ $packet->limitlist }}</p>
                    <p>Emails Versturen:  {{ $packet->limitmails }}</p>
                    <p>Email Templates:  {{ $packet->limittemplates }}</p>
                    <p>Prijs:  {{ $packet->price }}</p>
                    <input hidden type="number" id="id" name="id" value="{{ $packet->id }}" />
                    <button type="submit" class="btn btn-primary center_element">Kies Pakket</button>
                </div>
            </div>
            </div>
            <br>
            </form>
            @endforeach
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
