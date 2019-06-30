@extends('layouts.master')

@section('content')

        @if($faqs != null && count($faqs) > 0)

            @foreach($faqs as $faq)
            <br>
            <div class="card">
                <div class="card-header">
                    {{ $faq->question }}
                </div>
                <div class="card-body">{{ $faq->answer }}</div>
            </div>
            @endforeach

        @else
            <br>
            <div class="card">
                <div class="card-header">
                    Geen Frequently Asked Questions gevonden!
                </div> 
            </div>
        @endif

@endsection
