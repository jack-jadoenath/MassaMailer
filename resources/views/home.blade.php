@extends('layouts.master')

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
<div class="row">
    <div class="col-md-6">
        <h1>Massa Mailer</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas varius a libero vel mollis. Curabitur
            fermentum massa nunc, et tempor sem efficitur nec. Vivamus eleifend arcu ac ante convallis tristique.
            Vestibulum vel sapien sed tellus vulputate elementum. Vivamus nulla nibh, fringilla sagittis leo
            scelerisque, lobortis aliquam enim. Integer tincidunt scelerisque lorem sed mattis. Etiam convallis
            consequat mauris, ultrices aliquet tortor maximus sed. Quisque lacinia ex quis luctus lobortis. Sed dictum
            id purus pretium tincidunt. Ut fringilla, tellus et dignissim lobortis, massa orci eleifend justo, id porta
            nulla massa nec enim. Suspendisse vitae risus lacinia, iaculis augue vel, ultrices sem. Vestibulum non
            scelerisque sem. Pellentesque eget venenatis enim. Pellentesque pulvinar finibus hendrerit. Suspendisse
            potenti. Morbi eu lorem vehicula, vehicula purus nec, euismod ante.</p>
    </div>

    <div class="col-md-6">
        <img class="feature-image" src="{{asset('img/mail-desk.png')}}" />
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <img class="feature-image" src="{{asset('img/note.png')}}" />
    </div>

    <div class="col-md-6">
        <h1>Massa Mailer</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas varius a libero vel mollis. Curabitur
            fermentum massa nunc, et tempor sem efficitur nec. Vivamus eleifend arcu ac ante convallis tristique.
            Vestibulum vel sapien sed tellus vulputate elementum. Vivamus nulla nibh, fringilla sagittis leo
            scelerisque, lobortis aliquam enim. Integer tincidunt scelerisque lorem sed mattis. Etiam convallis
            consequat mauris, ultrices aliquet tortor maximus sed. Quisque lacinia ex quis luctus lobortis. Sed dictum
            id purus pretium tincidunt. Ut fringilla, tellus et dignissim lobortis, massa orci eleifend justo, id porta
            nulla massa nec enim. Suspendisse vitae risus lacinia, iaculis augue vel, ultrices sem. Vestibulum non
            scelerisque sem. Pellentesque eget venenatis enim. Pellentesque pulvinar finibus hendrerit. Suspendisse
            potenti. Morbi eu lorem vehicula, vehicula purus nec, euismod ante.</p>
    </div>
</div>
@endsection