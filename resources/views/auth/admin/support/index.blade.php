@extends('layouts.admin')

@section('content')
        {{ session('message') }}

        @if($tickets != null && count($tickets) > 0)

            @foreach($tickets as $ticket)
            <div class="card">
                <div class="card-header">
                    {{ $ticket->question }}
                    @if ($ticket->status == 0)
                        <a class="btn btn-warning" href="#"><i class="fa fa-bell" ></i></a>
                    @else
                        <a class="btn btn-success" href="#"><i class="fa fa-bell" ></i></a>
                    @endif
                    <a class="btn btn-primary right" href="{{ route('support.edit', $ticket) }}"><i class="fa fa-comment"></i></a>
                    <form method="POST" action="{{ route('support.destroy', $ticket) }}" class="right">
                        {{ method_field('DELETE') }}
                        @csrf
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash" ></i></button>
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
