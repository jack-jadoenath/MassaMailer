@extends('layouts.master')



@section('content')

        @if(session('message'))
            {{ session('message') }}
        @endif

        <div class="row">
            <div class="col-md-6">
                <form method="POST" action="{{ route('templates.update', $template) }}">
                @csrf
                {{ method_field('PATCH') }}

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Template Naam') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $template->name }}" required autocomplete="name">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="header_size" class="col-md-4 col-form-label text-md-right">{{ __('Header Hoogte (px)') }}</label>

                        <div class="col-md-6">
                            <input id="header_size" type="number" min="0" max="350" class="form-control @error('header_size') is-invalid @enderror" name="header_size" value="{{ $header->size }}" required autocomplete="header_size">

                            @error('header_size')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="header_color" class="col-md-4 col-form-label text-md-right">{{ __('Header Kleur') }}</label>

                        <div class="col-md-6">
                            <input id="header_color" type="color" class="form-control @error('header_color') is-invalid @enderror" name="header_color" value="{{ $header->color }}" required autocomplete="header_color">

                            @error('header_color')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="header_fontsize" class="col-md-4 col-form-label text-md-right">{{ __('Header Text Groote (px)') }}</label>

                        <div class="col-md-6">
                            <input id="header_fontsize" type="number" min="0" max="75" class="form-control @error('header_fontsize') is-invalid @enderror" name="header_fontsize" value="{{ $header->fontsize }}" required autocomplete="header_fontsize">

                            @error('header_fontsize')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="header_fontcolor" class="col-md-4 col-form-label text-md-right">{{ __('Header Tekst Kleur') }}</label>

                        <div class="col-md-6">
                            <input id="header_fontcolor" type="color" class="form-control @error('header_fontcolor') is-invalid @enderror" name="header_fontcolor" value="{{ $header->fontcolor }}" required autocomplete="header_fontcolor">

                            @error('header_fontcolor')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="footer_size" class="col-md-4 col-form-label text-md-right">{{ __('Footer Hoogte (px)') }}</label>

                        <div class="col-md-6">
                            <input id="footer_size" type="number" min="0" max="350" class="form-control @error('footer_size') is-invalid @enderror" name="footer_size" value="{{ $footer->size }}" required autocomplete="footer_size">

                            @error('footer_size')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="footer_color" class="col-md-4 col-form-label text-md-right">{{ __('Footer Kleur') }}</label>

                        <div class="col-md-6">
                            <input id="footer_color" type="color" class="form-control @error('footer_color') is-invalid @enderror" name="footer_color" value="{{ $footer->color }}" required autocomplete="footer_color">

                            @error('footer_color')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="footer_fontsize" class="col-md-4 col-form-label text-md-right">{{ __('Footer Text Groote (px)') }}</label>

                        <div class="col-md-6">
                            <input id="footer_fontsize" type="number" min="0" max="75" class="form-control @error('footer_fontsize') is-invalid @enderror" name="footer_fontsize" value="{{ $footer->fontsize }}" required autocomplete="footer_fontsize">

                            @error('footer_fontsize')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="footer_fontcolor" class="col-md-4 col-form-label text-md-right">{{ __('Footer Tekst Kleur') }}</label>

                        <div class="col-md-6">
                            <input id="footer_fontcolor" type="color" class="form-control @error('footer_fontcolor') is-invalid @enderror" name="footer_fontcolor" value="{{ $footer->fontcolor }}" required autocomplete="footer_fontcolor">

                            @error('footer_fontcolor')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4 template_button">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Opslaan') }}
                            </button>
                            <a onclick="setPreview();return false;" class="btn btn-primary">Voorbeeld Updaten</a>
                        </div>
                    </div>
                    <br>
                </form>
            </div>
            <iframe id="preview" class="col-md-6">

            </iframe>
        </div>
    <div class="row">
        <div class="col-md-12">
            <div class="filler">
`
            </div>
        </div>
    </div>

@endsection

@section('js')

<script onload="setPreview();return false;" src="{{asset('js/massamailer.js')}}"></script>

@endsection
