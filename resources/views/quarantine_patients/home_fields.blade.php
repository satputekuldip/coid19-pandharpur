
{!! Form::hidden('patient_id', $id) !!}


<!-- Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type', 'Quarantine Type:') !!}
    {!! Form::select('type', ['HOME'=>'HOME'] ,null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'House/Owner Name:') !!}
    {!! Form::text('name', $patient->full_name, ['class' => 'form-control']) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', 'Phone:') !!}
    {!! Form::text('phone', $patient->mobile, ['class' => 'form-control']) !!}
</div>

<!-- State Field -->
<div class="form-group col-sm-6">
    {!! Form::label('state_id', 'State:') !!}
    {!! Form::select('state_id',$states ?? [], $patient->state_id, ['class' => 'form-control','id'=>'state_id','onchange'=>"GetSelectedState(this)"]) !!}
</div>

<!-- District Field -->
<div class="form-group col-sm-6">
    {!! Form::label('district_id', 'District:') !!}
    {!! Form::select('district_id', $districts ?? [],$patient->district_id, ['class' => 'form-control','id'=>'district_id']) !!}
    {{--    <select name="district_id" id="district_id" class="form-control"></select>--}}


</div>

<!-- Tahasil Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tahasil_id', 'Tahasil:') !!}
    {!! Form::select('tahasil_id', $tahasils ?? [] , $patient->tahasil_id, ['class' => 'form-control','id'=>'tahasil_id']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', 'Address:') !!}
    {!! Form::text('address', $patient->current_address, ['class' => 'form-control']) !!}
</div>

<!-- Pincode Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pincode', 'Pincode:') !!}
    {!! Form::text('pincode', $patient->pincode, ['class' => 'form-control']) !!}
</div>


<!-- Covid Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('covid_status', 'Covid Status:') !!}
    {!! Form::select('covid_status', ['HOME_QUARANTINED'=>'HOME_QUARANTINED','INSTITUTE_QUARANTINED'=>'INSTITUTE_QUARANTINED','POSITIVE'=>'POSITIVE',
    'NEGATIVE'=>'NEGATIVE','RECOVERED'=>'RECOVERED','DEAD'=>'DEAD'] , null , ['class' => 'form-control']) !!}
</div>


<!-- Present At Quarantine Field -->
<div class="form-group col-sm-12">
    {!! Form::label('present_at_quarantine', 'Present At Quarantine:') !!}
    <label class="checkbox-inline">
        {!! Form::radio('present_at_quarantine', '1', null,  ['id' => 'present_at_quarantine']) !!}
        YES
    </label>
    <label class="checkbox-inline">
        {!! Form::radio('present_at_quarantine', '0', 1,  ['id' => 'present_at_quarantine']) !!}
        NO
    </label>
</div>



<!-- Quarantined At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('quarantined_at', 'Quarantined At:') !!}
    {!! Form::date('quarantined_at', date('Y-m-d'), ['class' => 'form-control','id'=>'quarantined_at']) !!}
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
<!-- Remark Field -->
<div class="form-group col-sm-8 col-lg-8">
    {!! Form::label('remark', 'Remark:') !!}
    {!! Form::text('remark', null, ['class' => 'form-control']) !!}
</div>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('quarantinePatients.index') }}" class="btn btn-default">Cancel</a>
</div>
