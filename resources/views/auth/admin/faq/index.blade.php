@extends('layouts.admin')

@section('content')
        {{ session('message') }}
        

        <form method="POST" action="{{ route('faq.index') }}">
            @csrf

            <div class="form-group row">
                <label for="question" class="col-md-1 col-form-label text-md-right">{{ __('Vraag') }}</label>

                <div class="col-md-11">
                    <input id="question" type="text" class="form-control @error('question') is-invalid @enderror" name="question" value="{{ old('question') }}" required autocomplete="question">

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
                    <textarea id="answer" type="text" class="form-control @error('answer') is-invalid @enderror" name="answer" value="{{ old('answer') }}" required autocomplete="answer"></textarea>

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
                        {{ __('Toevoegen') }}
                    </button>
                </div>
            </div>
        </form>



        @if($faqs != null && count($faqs) > 0)

            @foreach($faqs as $faq)
            <br>
            <div class="card">
                <div class="card-header">
                    {{ $faq->question }}
                    <a class="btn btn-primary right"  title="Bewerk" href="{{ route('faq.edit', $faq) }}"><i class="fa fa-pencil" ></i></a>
                    <form method="POST" action="{{ route('faq.destroy', $faq) }}" class="right">
                        {{ method_field('DELETE') }}
                        @csrf
                        <button type="submit"  title="Verwijder" class="btn btn-danger"><i class="fa fa-trash" ></i></button>
                    </form>
                </div>
                <div class="card-body">{{ $faq->answer }}</div>
            </div>
            @endforeach

        @else
            <br>
            <div class="card">
                <div class="card-header">
                    Geen Frequently Asked Questions gevonden!
                </div> 
            </div>
        @endif

@endsection
