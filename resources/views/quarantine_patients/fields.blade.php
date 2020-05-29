<!-- Patient Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('patient_id', 'Patient Id:') !!}
    {!! Form::number('patient_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Quarantine Address Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('quarantine_address_id', 'Quarantine Address Id:') !!}
    {!! Form::number('quarantine_address_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Covid Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('covid_status', 'Covid Status:') !!}
    {!! Form::select('covid_status', ['QUARANTINED'=>'QUARANTINED','POSITIVE'=>'POSITIVE',
    'NEGATIVE'=>'NEGATIVE','RECOVERED'=>'RECOVERED','DEAD'=>'DEAD'] , null , ['class' => 'form-control']) !!}
</div>


<!-- Present At Quarantine Field -->
<div class="form-group col-sm-6">
    {!! Form::label('present_at_quarantine', 'Present At Quarantine:') !!}
    <label class="checkbox-inline">
        {!! Form::radio('present_at_quarantine', '1', null,  ['id' => 'present_at_quarantine']) !!}
        YES
    </label>
    <label class="checkbox-inline">
        {!! Form::radio('present_at_quarantine', '0', null,  ['id' => 'present_at_quarantine']) !!}
        NO
    </label>
</div>

<!-- Remark Field -->
<div class="form-group col-sm-6 col-lg-6">
    {!! Form::label('remark', 'Remark:') !!}
    {!! Form::text('remark', null, ['class' => 'form-control']) !!}
</div>

<!-- Quarantined At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('quarantined_at', 'Quarantined At:') !!}
    {!! Form::date('quarantined_at', null, ['class' => 'form-control','id'=>'quarantined_at']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#quarantined_at').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: false
        })
    </script>
@endpush

<!-- Known Positive At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('known_positive_at', 'Known Positive At:') !!}
    {!! Form::date('known_positive_at', null, ['class' => 'form-control','id'=>'known_positive_at']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#known_positive_at').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: false
        })
    </script>
@endpush

<!-- Known Negative At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('known_negative_at', 'Known Negative At:') !!}
    {!! Form::date('known_negative_at', null, ['class' => 'form-control','id'=>'known_negative_at']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#known_negative_at').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: false
        })
    </script>
@endpush

<!-- Recovered At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('recovered_at', 'Recovered At:') !!}
    {!! Form::date('recovered_at', null, ['class' => 'form-control','id'=>'recovered_at']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#recovered_at').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: false
        })
    </script>
@endpush

<!-- Died At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('died_at', 'Died At:') !!}
    {!! Form::date('died_at', null, ['class' => 'form-control','id'=>'died_at']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#died_at').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: false
        })
    </script>
@endpush

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('quarantinePatients.index') }}" class="btn btn-default">Cancel</a>
</div>
