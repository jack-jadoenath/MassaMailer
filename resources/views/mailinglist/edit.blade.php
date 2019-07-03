@extends('layouts.master')

@section('content')

<title>Mailinglist aanpassen</title>

<div class="md-7">
    <h1 class="mt-5">Pas deze mailinglist aan</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors-all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif



    <form method="post" action="{{route('mailinglist.update', $mailinglist)}}" enctype="multipart/form-data">
        @method('PATCH')

        @csrf
        <div class="form-group row">
            <label for="name" class="col-sm-3 col-form-label">Lijst naam</label>
            <div class="col-sm-9">
                <input name="name" type="text" class="form-control" id="name" placeholder="{{ $mailinglist->name }}">
            </div>

            <div class="list">


            </div>
            <div class="form-group row">
                <div class="offset-sm-3 col-sm-9">
                    <button type="submit" class="btn btn-primary">Update Mailinglijst Aan</button>
                </div>
    </form>
</div>

@endsection