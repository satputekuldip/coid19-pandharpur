<!-- Recorded Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('recorded_date', 'Recorded Date:') !!}
    {!! Form::date('recorded_date', null, ['class' => 'form-control','id'=>'recorded_date']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#recorded_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endpush

<!-- Deaths Field -->
<div class="form-group col-sm-6">
    {!! Form::label('deaths', 'Deaths:') !!}
    {!! Form::number('deaths', null, ['class' => 'form-control']) !!}
</div>

<!-- Change In Day Field -->
<div class="form-group col-sm-6">
    {!! Form::label('change_in_day', 'Change In Day:') !!}
    {!! Form::number('change_in_day', null, ['class' => 'form-control']) !!}
</div>

<!-- Change In Day Percent Field -->
<div class="form-group col-sm-6">
    {!! Form::label('change_in_day_percent', 'Change In Day Percent:') !!}
    {!! Form::number('change_in_day_percent', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('dailyDeaths.index') }}" class="btn btn-default">Cancel</a>
</div>
