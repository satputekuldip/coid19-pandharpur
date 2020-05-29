<!-- Patient Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('patient_id', 'Patient Id:') !!}
    {!! Form::number('patient_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Checked At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('checked_at', 'Checked At:') !!}
    {!! Form::date('checked_at', null, ['class' => 'form-control','id'=>'checked_at']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#checked_at').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endpush

<!-- Symptoms Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('symptoms', 'Symptoms:') !!}
    {!! Form::textarea('symptoms', null, ['class' => 'form-control']) !!}
</div>

<!-- Remarks Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('remarks', 'Remarks:') !!}
    {!! Form::textarea('remarks', null, ['class' => 'form-control']) !!}
</div>

<!-- Complete Quarantine Days Field -->
<div class="form-group col-sm-6">
    {!! Form::label('complete_quarantine_days', 'Complete Quarantine Days:') !!}
    {!! Form::number('complete_quarantine_days', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('attendances.index') }}" class="btn btn-default">Cancel</a>
</div>
