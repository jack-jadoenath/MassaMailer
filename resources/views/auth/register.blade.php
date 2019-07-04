@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>
                
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm"
                                class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="phone">Telefoon:</label>
                            <div class="col-md-6"><input required class="form-control" id="phone" name="phone" type="text" value="{{ old('phone') }}" /></div>
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="card_last_four">Creditcard Nummer:</label>
                            <div class="col-md-6"><input required class="form-control" id="card_last_four" name="card_last_four" type="number" value="{{ old('card_last_four') }}"  /></div>
                            @error('card_last_four')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="card_valid">Geldig tot (mm/yy):</label>
                            <div class="col-md-6"><input required class="form-control" id="card_valid" name="card_valid" type="text" value="{{ old('card_valid') }}"  /></div>
                            @error('card_valid')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="card_ccv">CCV Code:</label>
                            <div class="col-md-6"><input required class="form-control" id="card_ccv" name="card_ccv" type="number" min="0" max="999" value="{{ old('card_ccv') }}"  /></div>
                            @error('card_ccv')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="packet">Pakketen:</label>
                            <div class="col-md-6"><div class="row">
                            @foreach($packets as $packet)
                                <div class="col-md-4" >
                                <input type="radio" id="packet" name="packet" @if(session('packet') == $packet->id) checked="checked"  @endif value="{{ $packet->id }}" />
                                            {{ $packet->name }}
                                           
                                </div>
                            @endforeach
                            </div></div>
                            @error('packet')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection