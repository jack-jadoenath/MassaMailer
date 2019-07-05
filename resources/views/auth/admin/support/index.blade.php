@extends('layouts.admin')

@section('content')
        {{ session('message') }}

        @if($tickets != null && count($tickets) > 0)

            @foreach($tickets as $ticket)
            <div class="card">
                <div class="card-header">
                    <b>{{ $ticket->user()->first()->name }}:</b> {{ $ticket->question }}
                    @if ($ticket->status == 0)
                        <a class="btn btn-warning" title="Open Ticket" href="#"><i class="fa fa-bell" ></i></a>
                    @else
                        <a class="btn btn-success" title="Beantwoorde Ticket" href="#"><i class="fa fa-bell" ></i></a>
                    @endif
                    <a class="btn btn-primary right"  title="Reageer" href="{{ route('support.edit', $ticket) }}"><i class="fa fa-comment"></i></a>
                    <form method="POST" action="{{ route('support.destroy', $ticket) }}" class="right">
                        {{ method_field('DELETE') }}
                        @csrf
                        <button type="submit"  title="Verwijder Ticket" class="btn btn-danger left"><i class="fa fa-trash" ></i></button>
                    </form>
                </div>
                <div class="card-body">{{ $ticket->message }}</div> 
                <div class="card-footer">{{ $ticket->answer }}</div>
            </div>
            <br>
            @endforeach
        @else
            <br>
            <div class="card">
                <div class="card-header">
                    Geen Supporttickets beschikbaar.
                </div> 
            </div>
        @endif
@endsection
