@extends('layouts.master')

@section('content')
   
<div class="row">
    <div class="col-md-6" >
    @if(session('message'))
        {{ session('message') }}
            <div class="row">
                <div class="filler"></div>
            </div>
    @endif
        <form method="POST" action="{{ route('templates.index') }}">
            @csrf

            Template aanmaken

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Naam') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name">

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Toevoegen') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-6">
                
    Op deze pagina kunnen nieuwe templates voor de mails aangemaakt worden. Druk op edit om de layout van de templates aan te passen.
    </div>
</div>

@foreach($templates as $template)
<br>
<div class="card">
    <div class="card-header">
        {{ $template->name }}
        <a class="btn btn-primary right" href="{{ route('templates.edit', $template) }}"><i class="fa fa-pencil" ></i></a>
        <form method="POST" action="{{ route('templates.destroy', $template) }}" class="right">
            {{ method_field('DELETE') }}
            @csrf
            <button type="submit" class="btn btn-primary red"><i class="fa fa-minus-circle" ></i></button>
        </form>
    </div>
</div>

@endforeach
<br>
@endsection
