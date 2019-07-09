@extends('layouts.admin')

@section('title')
    MM - Admin - FAQ
@endsection

@section('content')
        {{ session('message') }}
        
        <form method="POST" action="{{ route('faq.update', $faq) }}">
             {{ method_field('PATCH') }}
            @csrf
            

            <div class="form-group row">
                <label for="question" class="col-md-1 col-form-label text-md-right">{{ __('Vraag') }}</label>

                <div class="col-md-11">
                    <input id="question" type="text" class="form-control @error('question') is-invalid @enderror" name="question" value="{{ $faq->question }}" required autocomplete="question">

                    @error('question')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="answer" class="col-md-1 col-form-label text-md-right">{{ __('Antwoord') }}</label>

                <div class="col-md-11">
                    <textarea id="answer" type="text" class="form-control @error('answer') is-invalid @enderror" name="answer" value="{{ $faq->answer }}" required autocomplete="answer">{{ $faq->answer }}</textarea>

                    @error('message')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-1">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Opslaan') }}
                    </button>
                </div>
            </div>
        </form>

@endsection
