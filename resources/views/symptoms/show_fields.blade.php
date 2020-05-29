<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $symptom->name }}</p>
</div>

<!-- Name Marathi Field -->
<div class="form-group">
    {!! Form::label('name_marathi', 'Name Marathi:') !!}
    <p>{{ $symptom->name_marathi }}</p>
</div>

<!-- Risk Field -->
<div class="form-group">
    {!! Form::label('risk', 'Risk:') !!}
    <p>{{ $symptom->risk }}</p>
</div>

