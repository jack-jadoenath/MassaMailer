@extends('layouts.master')

@section('content')
    @guest
        CONTACTINFO
    @endguest
    @auth
        <div class="col-md-12" >
        @if(session('message'))
            {{ session('message') }}
        @endif

        <form method="POST" action="{{ route('contact.index') }}">
            @csrf

            <div class="form-group row">
                <label for="question" class="col-md-4 col-form-label text-md-right">{{ __('Vraag') }}</label>

                <div class="col-md-6">
                    <input id="question" type="text" class="form-control @error('question') is-invalid @enderror" name="question" value="{{ old('question') }}" required autocomplete="question">

                    @error('question')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="message" class="col-md-4 col-form-label text-md-right">{{ __('Bericht') }}</label>

                <div class="col-md-6">
                    <textarea id="message" type="text" class="form-control @error('message') is-invalid @enderror" name="message" value="{{ old('bericht') }}" required autocomplete="message"></textarea>

                    @error('message')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Verstuur') }}
                    </button>
                </div>
            </div>
        </form>

        @foreach($supporttickets as $supportticket)
        <br>
        <div class="card">
            <div class="card-header">
            @if ($supportticket->status == 0)
                {{ $supportticket->question }}
                <a class="btn btn-primary" href="{{ route('contact.edit', $supportticket) }}"><i class="fa fa-pencil" ></i></a>
                    <form method="POST" action="{{ route('contact.destroy', $supportticket) }}" class="delete">
                        {{ method_field('DELETE') }}
                        @csrf
                        <button type="submit" class="btn btn-primary red"><i class="fa fa-minus-circle" ></i></button>
                    </form>
            @elseif ($supportticket->status == 1 or $supportticket->status == 2)
                {{ $supportticket->question }}
            @endif
            </div>
            <div class="card-body">{{ $supportticket->message }}</div> 
            <div class="card-footer">{{ $supportticket->answer }}</div>
        </div>
        @endforeach
        <br>
        </div>
    @endauth
@endsection
