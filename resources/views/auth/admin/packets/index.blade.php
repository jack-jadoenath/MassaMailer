@extends('layouts.admin')

@section('content')
        {{ session('message') }}
        <div class="row">
            <div class="col-md-6" >

                <form method="POST" action="{{ route('packets.index') }}">
                    @csrf

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

                    <div class="form-group row">
                        <label for="limitlist" class="col-md-4 col-form-label text-md-right">{{ __('Lijsten') }}</label>

                        <div class="col-md-6">
                            <input id="limitlist" type="number" min="0" max="99999999999" class="form-control @error('limitlist') is-invalid @enderror" name="limitlist" value="{{ old('limitlist') }}" required autocomplete="limitlist">

                            @error('limitlist')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="limitmails" class="col-md-4 col-form-label text-md-right">{{ __('Emails') }}</label>

                        <div class="col-md-6">
                            <input id="limitmails" type="number" min="0" max="99999999999" class="form-control @error('limitmails') is-invalid @enderror" name="limitmails" value="{{ old('limitmails') }}" required autocomplete="limitmails">

                            @error('limitmails')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="limittemplates" class="col-md-4 col-form-label text-md-right">{{ __('Templates') }}</label>

                        <div class="col-md-6">
                            <input id="limittemplates" type="number" min="0" max="99999999999" class="form-control @error('limittemplates') is-invalid @enderror" name="limittemplates" value="{{ old('limittemplates') }}" required autocomplete="limittemplates">

                            @error('limittemplates')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Prijs') }}</label>

                        <div class="col-md-6">
                            <input id="price" type="number" min="0" max="999.99" step="0.01" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="price">

                            @error('price')
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


        @if($packets != null && count($packets) > 0)

            @foreach($packets as $packet)
            <br>
            <div class="card">
                <div class="card-header">
                    {{ $packet->name }}
                    <a class="btn btn-primary" href="{{ route('packets.edit', $packet) }}"><i class="fa fa-pencil" ></i></a>
                    <form method="POST" action="{{ route('packets.destroy', $packet) }}">
                        {{ method_field('DELETE') }}
                        @csrf
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash" ></i></button>
                    </form>
                </div>
            </div>
            @endforeach

        @else
            <br>
            <div class="card">
                <div class="card-header">
                    Geen Pakketten gevonden.
                </div> 
            </div>
        @endif


        

@endsection
