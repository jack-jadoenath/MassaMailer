@extends('layouts.master')

@section('content')

    <div class="col-md-6">
        <div class="form-group">
            <label for="name">Naam:</label>
            <input class="form-control" id="name" name="name" type="text" value="{{ $user->name }}" readonly="true"  />
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="email">Email:</label>
            <input class="form-control" id="email" name="email" type="email" value="{{ $user->email }}" readonly="true"  />
        </div>
    </div>
    

@endsection