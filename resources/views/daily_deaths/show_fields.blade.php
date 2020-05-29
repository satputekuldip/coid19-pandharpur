<!-- Recorded Date Field -->
<div class="form-group">
    {!! Form::label('recorded_date', 'Recorded Date:') !!}
    <p>{{ $dailyDeath->recorded_date }}</p>
</div>

<!-- Deaths Field -->
<div class="form-group">
    {!! Form::label('deaths', 'Deaths:') !!}
    <p>{{ $dailyDeath->deaths }}</p>
</div>

<!-- Change In Day Field -->
<div class="form-group">
    {!! Form::label('change_in_day', 'Change In Day:') !!}
    <p>{{ $dailyDeath->change_in_day }}</p>
</div>

<!-- Change In Day Percent Field -->
<div class="form-group">
    {!! Form::label('change_in_day_percent', 'Change In Day Percent:') !!}
    <p>{{ $dailyDeath->change_in_day_percent }}</p>
</div>

