@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-12">

        Mail opstellen

        <form method="POST" action="{{ route('mail.create') }}">
            @method('POST')
            @csrf
            <div class="form-group row">
                @if(!empty($templates))
                <select name="templates_id" class="form-control">


                    @foreach ($templates as $template)

                    <option value="{{$template->id}}">{{$template->name}}</option>

                    @endforeach

                </select>
                @else
                <select name="null" type="disabled" class="form-control">



                    <option value="Voeg een template toe!">Voeg een template toe!</option>


                </select>
                @endif


                <select class="form-control">
                    @foreach ($mailinglists as $mailinglist)
                    <option name="{{$mailinglist->id }}">{{$mailinglist->name}}</option>

                    @endforeach
                </select>

                <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="name" class="col-form-label">Onderwerp</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Onderwerp">
                    </div>
                    <div class="shadow-textarea">
                        <label for="message">Bericht</label>
                        <textarea class="form-control z-depth-1" id="exampleFormControlTextarea6"
                            placeholder="Schrijf uw bericht hier..."></textarea>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="form-group">
                                <div class='input-group date' id='datetimepicker2'>
                                    <input type='text' class="form-control" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>

                            <script type="text/javascript">
                                $(function () {
                                    $('#datetimepicker2').datetimepicker({
                                        locale: 'nl'
                                        startDate: date
                                    });
                                });
                            </script>
                        </div>
                    </div>
                    <div class="form-group row">
                        <button type="submit" class="btn btn-primary">Sla bericht op</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>

@endsection