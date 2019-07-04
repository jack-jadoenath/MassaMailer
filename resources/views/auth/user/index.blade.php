@extends('layouts.master')

@section('content')
        
    @if(session('message'))
        <p>{{ session('message') }}</p>
    @endif


    <a href="{{ route('account.edit', $user) }}" class="btn btn-primary" >Bewerk mijn gegevens</a>
    <div class="col-md-6">
        <div class="form-group">
            <label for="name">Naam:</label>
            <input class="form-control" id="name" name="name" type="text" value="{{ $user->name }}" readonly="true"  />
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="email">Email:</label>
            <input class="form-control" id="email" name="email" type="email" value="{{ $user->email }}" readonly="true"  />
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="phone">Telefoon:</label>
            <input class="form-control" id="phone" name="phone" type="text" value="{{ $user->phone }}" readonly="true"  />
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="card_last_four">Creditcard Nummer:</label>
            <input class="form-control" id="card_last_four" name="card_last_four" type="text" value="************{{ $user->card_last_four }}" readonly="true"  />
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="packet">Email Pakket:</label>
            @if($packet != null)
                <div class="card">
                    <div class="card-header">
                        {{ $packet->name }}
                    </div>
                </div>
            @else
                <div class="card">
                    <div class="card-header">
                        Geen Pakket gekoppeld aan dit account.
                    </div>
                </div>
            @endif
        </div>
    </div>
    
    

@endsection



