<!-- Patient Id Field -->
<div class="form-group">
    {!! Form::label('patient_id', 'Patient Id:') !!}
    <p>{{ $quarantinePatient->patient_id }}</p>
</div>

<!-- Quarantine Address Id Field -->
<div class="form-group">
    {!! Form::label('quarantine_address_id', 'Quarantine Address Id:') !!}
    <p>{{ $quarantinePatient->quarantine_address_id }}</p>
</div>

<!-- Covid Status Field -->
<div class="form-group">
    {!! Form::label('covid_status', 'Covid Status:') !!}
    <p>{{ $quarantinePatient->covid_status }}</p>
</div>

<!-- Present At Quarantine Field -->
<div class="form-group">
    {!! Form::label('present_at_quarantine', 'Present At Quarantine:') !!}
    <p>{{ $quarantinePatient->present_at_quarantine }}</p>
</div>

<!-- Remark Field -->
<div class="form-group">
    {!! Form::label('remark', 'Remark:') !!}
    <p>{{ $quarantinePatient->remark }}</p>
</div>

<!-- Quarantined At Field -->
<div class="form-group">
    {!! Form::label('quarantined_at', 'Quarantined At:') !!}
    <p>{{ $quarantinePatient->quarantined_at }}</p>
</div>

<!-- Known Positive At Field -->
<div class="form-group">
    {!! Form::label('known_positive_at', 'Known Positive At:') !!}
    <p>{{ $quarantinePatient->known_positive_at }}</p>
</div>

<!-- Known Negative At Field -->
<div class="form-group">
    {!! Form::label('known_negative_at', 'Known Negative At:') !!}
    <p>{{ $quarantinePatient->known_negative_at }}</p>
</div>

<!-- Recovered At Field -->
<div class="form-group">
    {!! Form::label('recovered_at', 'Recovered At:') !!}
    <p>{{ $quarantinePatient->recovered_at }}</p>
</div>

<!-- Died At Field -->
<div class="form-group">
    {!! Form::label('died_at', 'Died At:') !!}
    <p>{{ $quarantinePatient->died_at }}</p>
</div>

