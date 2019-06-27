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
        <p>Massa Mailer is an tool for companies to send emails to multiple recipients.
            With customizable email templates it is possible to create a personal tough to your message.
            Massa Mailer allows for multiple mailing lists with this you can have different mails for different targets.
            With different packages you can upgrade your reach to multiple customers.
            Massa Mailer is basically the ultimate tool for email marketing.
        </p>
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
        <h1>What is email marketing?</h1>
        <p>Email marketing is the act of sending a commercial message, typically to a group of people, using email. 
            In its broadest sense, every email sent to a potential or current customer could be considered email marketing. 
            It usually involves using email to send advertisements, request business, or solicit sales or donations, and is meant to build loyalty, trust, or brand awareness. 
            Marketing emails can be sent to a purchased lead list or a current customer database. 
            The term usually refers to sending email messages with the purpose of enhancing a merchant's relationship with current or previous customers, encouraging customer loyalty and repeat business, acquiring new customers or convincing current customers to purchase something immediately, and sharing third-party ads. 
        </p>
    </div>
</div>
@endsection