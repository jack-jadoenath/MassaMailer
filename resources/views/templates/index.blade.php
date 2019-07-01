@extends('layouts.master')

@section('content')
   
<div class="row">
            <div class="col-md-6" >

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
                
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas quis interdum libero. Suspendisse tincidunt metus volutpat, convallis arcu non, volutpat quam. Sed nunc ante, sagittis nec dui quis, sodales semper quam. Morbi cursus turpis ut purus sollicitudin, ut facilisis turpis auctor. Nullam varius tortor nibh, non gravida dui iaculis egestas. Cras at suscipit massa. Sed sed feugiat neque, nec laoreet massa. Vivamus hendrerit eu tellus quis feugiat. Donec at ipsum mauris. Sed a tincidunt ex. Vestibulum sodales vel magna vitae laoreet.
            </div>
        </div>

        @foreach($templates as $template)
        <br>
        <div class="card">
            <div class="card-header">
                {{ $template->name }}
                <a class="btn btn-primary" href="{{ route('templates.edit', $template) }}"><i class="fa fa-pencil" ></i></a>
                <form method="POST" action="{{ route('templates.destroy', $template) }}">
                    {{ method_field('DELETE') }}
                    @csrf
                    <button type="submit" class="btn btn-primary"><i class="fa fa-minus-circle" ></i></button>
                </form>
            </div>
        </div>
        @endforeach

@endsection