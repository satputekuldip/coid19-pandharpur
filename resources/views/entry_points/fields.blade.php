<!-- State Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('state_id', 'State Id:') !!}
    {!! Form::number('state_id', null, ['class' => 'form-control']) !!}
</div>

<!-- District Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('district_id', 'District Id:') !!}
    {!! Form::number('district_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Tahasil Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tahasil_id', 'Tahasil Id:') !!}
    {!! Form::number('tahasil_id', null, ['class' => 'form-control']) !!}
</div>

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

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('entryPoints.index') }}" class="btn btn-default">Cancel</a>
</div>
