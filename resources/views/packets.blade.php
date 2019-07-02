@extends('layouts.master')

@section('content')

        @if($packets != null && count($packets) > 0)

            @foreach($packets as $packet)
            <br>
            <div class="card">
                <div class="card-header">
                    {{ $packet->name }}
                </div>
                <div class="card-body">{{ $packet->name }}</div>
            </div>
            @endforeach

        @else
            <br>
            <div class="card">
                <div class="card-header">
                    Geen Pakketten gevonden.
                </div> 
            </div>
        @endif

@endsection
