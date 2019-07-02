@extends('layouts.admin')

@section('content')
    @if (session('status'))
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Dashboard</div>
                        <div class="card-body">
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="row dashboard_row">
        <div class="col-md-5 dashboard_div">
            <div class="dashboard_icon_div">
                <a href="#" class="dashboard_icon">U</a>
            </div>
            <div class="dashboard_div_text">
                <a href="#">User beheer</a>
            </div>
        </div>

        <div class="col-md-5 dashboard_div offset-md-2">
            <div class="dashboard_icon_div">
                <a href="{{ url('/admin/packets') }}" class="dashboard_icon">P</a>
            </div>
            <div class="dashboard_div_text">
                <a href="{{ url('/admin/packets') }}">Pakketten beheer</a>
            </div>
        </div>
    </div>
    <div class="row dashboard_row">
        <div class="col-md-5 dashboard_div">
            <div class="dashboard_icon_div">
                <a href="{{ url('/admin/support') }}" class="dashboard_icon">S</a>
            </div>
            <div class="dashboard_div_text">
                <a href="{{ url('/admin/support') }}">Support interface</a>
            </div>
        </div>

        <div class="col-md-5 dashboard_div offset-md-2">
            <div class="dashboard_icon_div">
                <a href="{{ url('/admin/faq') }}" class="dashboard_icon">F</a>
            </div>
            <div class="dashboard_div_text">
                <a href="{{ url('/admin/faq') }}">FAQ beheer</a>
            </div>
        </div>
    </div>
@endsection
