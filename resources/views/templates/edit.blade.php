@extends('layouts.master')

@section('content')

        @if(session('message'))
            {{ session('message') }}
        @endif

        <form method="POST" action="{{ route('contact.update', $supportticket) }}">
            @csrf
            {{ method_field('PATCH') }}

            <div class="form-group row">
                <label for="question" class="col-md-4 col-form-label text-md-right">{{ __('Vraag') }}</label>

                <div class="col-md-6">
                    <input id="question" type="text" class="form-control @error('question') is-invalid @enderror" name="question" value="{{ $supportticket->question }}" required autocomplete="question">

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
                    <textarea id="message" type="text" class="form-control @error('message') is-invalid @enderror" name="message" value="{{ $supportticket->message }}" required autocomplete="message">{{ $supportticket->message }}</textarea>

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
                        {{ __('Bewerk') }}
                    </button>
                </div>
            </div>
        </form>

@endsection