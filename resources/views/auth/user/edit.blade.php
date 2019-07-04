@extends('layouts.master')

@section('content')
<style>
.invalid-feedback{
    display: block;
}
</style>
<form method="POST" action="{{route('account.update', $user)}}"> 
@method('PATCH')

        @csrf
    <div class="col-md-6">
        <div class="form-group">
            <label for="name">Naam:</label>
            <input required class="form-control" id="name" name="name" type="text" value="{{ $user->name }}"  />
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="email">Email:</label>
            <input required class="form-control" id="email" name="email" type="email" value="{{ $user->email }}"  />
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="phone">Telefoon:</label>
            <input required class="form-control" id="phone" name="phone" type="text" value="{{ $user->phone }}" />
            @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="card_last_four">Creditcard Nummer:</label>
            <input required class="form-control" id="card_last_four" name="card_last_four" type="number" value=""  />
            @error('card_last_four')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="card_valid">Geldig tot (mm/yy):</label>
            <input required class="form-control" id="card_valid" name="card_valid" type="text" value=""  />
            @error('card_valid')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="card_ccv">CCV Code:</label>
            <input required class="form-control" id="card_ccv" name="card_ccv" type="number" min="0" max="999" value=""  />
            @error('card_ccv')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
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
            @error('packet')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <button class="form-control btn btn-primary"  type="submit"  >Opslaan</button>
        </div>
    </div>
    
    </form>

@endsection
