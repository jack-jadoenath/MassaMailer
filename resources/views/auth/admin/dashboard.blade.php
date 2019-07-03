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
        <div class="col-md-5 dashboard_div" style="cursor: pointer;" onclick="window.location='{{ url('/admin/user') }}';">
            <div class="dashboard_icon_div">
                <p class="dashboard_icon">U</p>
            </div>
            <div class="dashboard_div_text">
                <p>User beheer</p>
            </div>
        </div>

        <div class="col-md-5 dashboard_div offset-md-2" style="cursor: pointer;" onclick="window.location='{{ url('/admin/packets') }}';">
            <div class="dashboard_icon_div">
                <p class="dashboard_icon">P</p>
            </div>
            <div class="dashboard_div_text">
                <p>Pakketten beheer</p>
            </div>
        </div>
    </div>
    <div class="row dashboard_row">
        <div class="col-md-5 dashboard_div" style="cursor: pointer;" onclick="window.location='{{ url('/admin/support') }}';">
            <div class="dashboard_icon_div">
                <p class="dashboard_icon">S</p>
            </div>
            <div class="dashboard_div_text">
                <p>Support interface</p>
            </div>
        </div>

        <div class="col-md-5 dashboard_div offset-md-2" style="cursor: pointer;" onclick="window.location='{{ url('/admin/faq') }}';">
            <div class="dashboard_icon_div">
                <p class="dashboard_icon">F</p>
            </div>
            <div class="dashboard_div_text">
                <p>FAQ beheer</p>
            </div>
        </div>
    </div>
@endsection
