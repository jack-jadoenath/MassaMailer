@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-9">

        Mail opstellen

        <form method="POST" action="{{ route('mail.index') }}">
            @method('POST')
            @csrf
            <div class="col-sm-10 form-group row">

                <select name="templates_id" class="form-control">

                    @foreach ($templates as $template)

                    <option value="{{$template->id}}">{{$template->name}}</option>

                    @endforeach
                </select>

                <select class="form-control">
                    @foreach ($mailinglists as $mailinglist)
                    <option name="{{$mailinglist->id }}">{{$mailinglist->name}}</option>

                    @endforeach
                </select>

                <div class="col-sm-10 form-group row">
                    <div class="col-sm-12">
                        <label for="name" class="col-form-label">Onderwerp</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Onderwerp">
                    </div>
                    <div class="col-sm-12">
                        <label for="message" class="col-form-label">Bericht</label>
                        <input type="text" name="message" class="form-control" id="message" placeholder="Bericht">
                    </div>
                    <div class="container col-sm-12">
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