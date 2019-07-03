@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-9">

        <form method="POST" action="{{ route('') }}">
            @csrf

            Mail opstellen