@extends('layouts.admin')

@section('content')
    @auth
        @if(session('message'))
            {{ session('message') }}
        @endif
        <div class="card">
            <div class="card-header">
            
                {{ $supportticket->question }}
                @if ($supportticket->status == 0)
                    <a class="btn btn-warning" href="#"><i class="fa fa-bell" ></i></a>
                @else
                    <a class="btn btn-success" href="#"><i class="fa fa-bell" ></i></a>
                @endif
            </div>
            <div class="card-body">{{ $supportticket->message }}</div>
        </div>
        <form method="POST" action="{{ route('support.update', $supportticket) }}">
            @csrf
            {{ method_field('PATCH') }}
            <div class="form-group row">


                <div class="col-md-12">
                    <label for="answer" class="col-form-label text-md-right">{{ __('Antwoord') }}</label>
                    <input id="answer" type="text" class="form-control @error('answer') is-invalid @enderror" name="answer" value="{{ $supportticket->answer }}" required autocomplete="answer">

                    @error('answer')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-8">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Bewerk') }}
                    </button>
                </div>
            </div>
        </form>
    @endauth
@endsection
