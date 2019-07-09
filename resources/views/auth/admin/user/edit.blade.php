@extends('layouts.admin')

@section('title')
    MM - Admin - Users
@endsection

@section('content')
        {{ session('message') }}
        <div class="row">
            <div class="col-md-6" >

                <form method="POST" action="{{ route('user.update', $user) }}">
                     {{ method_field('PATCH') }}
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Naam') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Telefoon') }}</label>

                        <div class="col-md-6">
                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $user->phone }}" required autocomplete="phone">

                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="limittemplates" class="col-md-4 col-form-label text-md-right">{{ __('Templates') }}</label>

                        <div class="col-md-6">
                            <select class="form-control" name="package">
                                @foreach($packages as $package)
                                    @if($package->id == $user->packages_id) 
                                        <option selected value="{{ $package->id }}">{{ $package->name }}</option>
                                    @else
                                        <option  value="{{ $package->id }}">{{ $package->name }}</option>
                                    @endif
                                    
                                @endforeach
                            </select> 
                            @error('limittemplates')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Opslaan') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6">

                Bewerk gegevens van een gebruiker.
            </div>
        </div>


        

@endsection
