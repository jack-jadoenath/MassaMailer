@extends('layouts.master')

@section('content')

<div class="md-7">
    <h1 class="mt-5">Mailing list</h1>

    <table class="table .tablestriped">
        <thead class="thead">
            <tr>
                <th scope="col">Name</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="row">{{$mailinglists->id}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @endsection