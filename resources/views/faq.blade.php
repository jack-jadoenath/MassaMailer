@extends('layouts.master')

@section('content')

        <div class="row">
            <div class="col-md-12">
                Welkom op de FAQ pagina. Hier zijn de veel gestelde vragen te zien.
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 filler"></div>
        </div>

        @if($faqs != null && count($faqs) > 0)

            @foreach($faqs as $faq)
            <div class="card">
                <button class="accordion">
                    {{ $faq->question }}
                </button>
                <div class="panel">{{ $faq->answer }}</div>
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

        <script>
            var acc = document.getElementsByClassName("accordion");
            var i;

            for (i = 0; i < acc.length; i++) {
                acc[i].addEventListener("click", function() {
                    this.classList.toggle("active");
                    var panel = this.nextElementSibling;
                    if (panel.style.display === "block") {
                        panel.style.display = "none";
                    } else {
                        panel.style.display = "block";
                    }
                });
            }
        </script>
@endsection
