@extends('layouts.master')

@section('content')

<title>Maak een mailinglist</title>

<div class="md-7">
    <h1 class="mt-5">Voeg een Mailing lijst toe</h1>

    <form method="post" action="{{route('mailinglist.index')}}" enctype="multipart/form-data">
        @method('POST')
        @csrf
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Lijst naam</label>
            <div class="col-sm-10">
                <input name="name" type="text" class="form-control" id="name" placeholder="Lijst naam">
            </div>

            <div class="form-group row">
                <div class="offset-sm-3">
                    <button type="submit" class="btn btn-primary">Voeg Mailinglijst toe</button>
                </div>

            </div>
        </div>
    </form>

</div>


@endsection