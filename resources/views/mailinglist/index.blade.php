@extends('layouts.master')

@section('content')

<div class="md-7">
    <h1 class="mt-5">Mailing list</h1>

    <table class="table">
        <thead class="thead">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Naam</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="row">{{ $mailinglists->id }}</td>
                <td> {{ $mailinglists->name }} </td>

            </tr>
        </tbody>
    </table>

    @endsection