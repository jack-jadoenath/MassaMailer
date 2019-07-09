@extends('layouts.master')

@section('content')

<div class="row">
    <label>Mail opstellen</label>
    <div class="col-md-12">



        <form method="post" action="{{ route('mail.store') }}">
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
                    <option type="disabled" value="Voeg een template toe!">Voeg een template toe!</option>
                </select>
                @endif

                <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="name" class="col-form-label">Onderwerp</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Onderwerp">
                    </div>
                    <div class="col-sm-12 shadow-textarea">
                        <label for="message">Bericht</label>
                        <textarea class="form-control z-depth-1" rows="13" name="message" id="message"
                            placeholder="Schrijf uw bericht hier..."></textarea>
                    </div>
                    <div class="col-sm-12">
                        <label for="send_at">Verstuur datum (optioneel)</label>
                        <div class='input-group date' id='datetimepicker2'>
                            <input type='date' name="send_at" class="form-control" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
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
