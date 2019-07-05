@extends('layouts.master')

@section('content')
<style>
.invalid-feedback{
    display: block;
}
</style>
<div class="row">
    <form method="POST" action="{{route('account.update', $account)}}" class="col-md-6">
    @method('PATCH')

        @csrf
        <div class="form-group">
            <label for="name">Naam:</label>
            <input required class="form-control" id="name" name="name" type="text" value="{{ $account->name }}"  />
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input required class="form-control" id="email" name="email" type="email" value="{{ $account->email }}"  />
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="phone">Telefoon:</label>
            <input required class="form-control" id="phone" name="phone" type="text" value="{{ $account->phone }}" />
            @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="card_last_four">Creditcard Nummer:</label>
            <input required class="form-control" id="card_last_four" name="card_last_four" type="number" value=""  />
            @error('card_last_four')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="card_valid">Geldig tot (mm/yy):</label>
            <input required class="form-control" id="card_valid" name="card_valid" type="text" value=""  />
            @error('card_valid')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="card_ccv">CCV Code:</label>
            <input required class="form-control" id="card_ccv" name="card_ccv" type="number" min="0" max="999" value=""  />
            @error('card_ccv')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
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
                            <input @if($packet->id == $account->packages_id) checked  @endif type="radio" id="packet" name="packet" value="{{ $packet->id }}" />
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
        <div class="form-group">
            <button class="form-control btn btn-primary"  type="submit"  >Opslaan</button>
        </div>
    </form>
    <div class="col-md-6">
        <br>
        Welkom op de account edit pagina.
        <br>
        <br>
        Hier kunnen de account gegevens aangepast worden.
    </div>
</div>

@endsection
