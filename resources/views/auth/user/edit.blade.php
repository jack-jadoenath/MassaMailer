@extends('layouts.master')

@section('content')
<form method="POST" action="{{route('account.update', $user)}}"> 
@method('PATCH')

        @csrf
    <div class="col-md-6">
        <div class="form-group">
            <label for="name">Naam:</label>
            <input required class="form-control" id="name" name="name" type="text" value="{{ $user->name }}"  />
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="email">Email:</label>
            <input required class="form-control" id="email" name="email" type="email" value="{{ $user->email }}"  />
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="phone">Telefoon:</label>
            <input required class="form-control" id="phone" name="phone" type="text" value="{{ $user->phone }}" />
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="card_last_four">Creditcard Nummer:</label>
            <input required class="form-control" id="card_last_four" name="card_last_four" type="number" value=""  />
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="card_valid">Geldig tot (mm/yy):</label>
            <input required class="form-control" id="card_valid" name="card_valid" type="text" value=""  />
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="card_ccv">CCV Code:</label>
            <input required class="form-control" id="card_ccv" name="card_ccv" type="number" min="0" max="999" value=""  />
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="packet">Pakketen:</label>
            <div class="row">
            @foreach($packets as $packet)
                <div class="col-md-4" >
                    <div class="card">
                        <div class="card-header">
                            {{ $packet->name }}
                        </div>
                        <div class="card-body">
                            <input type="radio" id="packet" name="packet" value="{{ $packet->id }}" />
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <button class="form-control btn btn-primary"  type="submit"  >Opslaan</button>
        </div>
    </div>
    
    </form>

@endsection
