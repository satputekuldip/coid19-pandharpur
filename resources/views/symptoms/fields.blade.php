<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Marathi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name_marathi', 'Name Marathi:') !!}
    {!! Form::text('name_marathi', null, ['class' => 'form-control']) !!}
</div>

<!-- Risk Field -->
<div class="form-group col-sm-6">
    {!! Form::label('risk', 'Risk:') !!}
    {!! Form::text('risk', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('symptoms.index') }}" class="btn btn-default">Cancel</a>
</div>
