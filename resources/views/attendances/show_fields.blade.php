<!-- Patient Id Field -->
<div class="form-group">
    {!! Form::label('patient_id', 'Patient Id:') !!}
    <p>{{ $attendance->patient_id }}</p>
</div>

<!-- Checked At Field -->
<div class="form-group">
    {!! Form::label('checked_at', 'Checked At:') !!}
    <p>{{ $attendance->checked_at }}</p>
</div>

<!-- Symptoms Field -->
<div class="form-group">
    {!! Form::label('symptoms', 'Symptoms:') !!}
    <p>{{ $attendance->symptoms }}</p>
</div>

<!-- Remarks Field -->
<div class="form-group">
    {!! Form::label('remarks', 'Remarks:') !!}
    <p>{{ $attendance->remarks }}</p>
</div>

<!-- Complete Quarantine Days Field -->
<div class="form-group">
    {!! Form::label('complete_quarantine_days', 'Complete Quarantine Days:') !!}
    <p>{{ $attendance->complete_quarantine_days }}</p>
</div>

