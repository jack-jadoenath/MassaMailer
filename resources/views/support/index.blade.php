@extends('layouts.master')

@section('content')
    @guest
        <div class="row">
            <div class="col-md-6">
                Massa Mailer maakt gebruik van een interne support programma. Om hiervan gebruik te maken is een account noodzakelijk. Alternatief is een mail sturen ook mogelijk, echter kan het zijn dat de reactie tijd hierbij wat langer duurt.
                Mocht een vraag veel spoed hebben is het ook mogelijk om de support te bellen. Of een brief sturen is ook mogelijk.
                <br>
                Het is ook mogelijk dat een vraag al vaker gesteld is dus voordat er contact opgenomen wordt raden wij aan om de FAQ (frequently asked questions) pagina te bekijken of de vraag daar niet al in staat.
            </div>
            <div class="col-md-5 offset-md-1">
                <img class="feature-image office" src="{{asset('img/office.jpg')}}" />
                <br>
                SUPPORT
                <br>
                Karen Turner

                <li>support@massamailer.com</li>
                <li>06735586378</li>
                <li>4587 DK, Earnewald, The Netherlands</li>

            </div>
        </div>
    @endguest
    @auth
        <div class="col-md-12" >
        @if(session('message'))
            {{ session('message') }}
        @endif

        <form method="POST" action="{{ route('contact.index') }}">
            @csrf
            <div class="row filler">
            </div>
            <div class="form-group row">
                <label for="question" class="col-md-2 col-form-label text-md-right">{{ __('Vraag') }}</label>

                <div class="col-md-6">
                    <input id="question" type="text" class="form-control @error('question') is-invalid @enderror" name="question" value="{{ old('question') }}" required autocomplete="question">

                    @error('question')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4">
                    Welkom op de support pagina.
                </div>
            </div>

            <div class="form-group row">
                <label for="message" class="col-md-2 col-form-label text-md-right">{{ __('Bericht') }}</label>

                <div class="col-md-6">
                    <textarea id="message" type="text" class="form-control @error('message') is-invalid @enderror" name="message" value="{{ old('bericht') }}" required autocomplete="message"></textarea>

                    @error('message')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4">
                    Stel de vraag en aanduiding hier naast en ons team komt er zo snel mogelijk op terug.
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4 left">
                    <button type="submit" class="btn btn-primary left">
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
                @if ($supportticket->status == 0)
                    <a class="btn btn-warning" title="Open Ticket" href="#"><i class="fa fa-bell" ></i></a>
                @else
                    <a class="btn btn-success" title="Beantwoorde Ticket" href="#"><i class="fa fa-bell" ></i></a>
                @endif
                <a class="btn btn-primary right" title="Bewerk mijn ticket" href="{{ route('contact.edit', $supportticket) }}"><i class="fa fa-pencil" ></i></a>
                    <form method="POST" action="{{ route('contact.destroy', $supportticket) }}" class="right">
                        {{ method_field('DELETE') }}
                        @csrf
                        <button type="submit" title="Sluit mijn ticket" class="btn btn-primary red"><i class="fa fa-minus-circle" ></i></button>
                    </form>
            @elseif ($supportticket->status == 1 or $supportticket->status == 2)
                {{ $supportticket->question }}
                <a class="btn btn-danger" title="Gesloten Ticket" href="#"><i class="fa fa-bell" ></i></a>
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
