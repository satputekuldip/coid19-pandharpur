<!-- Full Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('full_name', 'Full Name:') !!}
    {!! Form::text('full_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Gender Field -->
<div class="form-group col-sm-6">
    {!! Form::label('gender', 'Gender:') !!}
    {!! Form::select('gender', ['MALE'=>'MALE','FEMALE'=>'FEMALE','OTHER'=>'OTHER' ] , null , ['class' => 'form-control']) !!}
</div>

<!-- Age Field -->
<div class="form-group col-sm-6">
    {!! Form::label('age', 'Age:') !!}
    {!! Form::number('age', null, ['class' => 'form-control']) !!}
</div>

<!-- Mobile Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mobile', 'Mobile:') !!}
    {!! Form::text('mobile', null, ['class' => 'form-control']) !!}
</div>


<!-- State Field -->
<div class="form-group col-sm-6">
    {!! Form::label('state_id', 'State:') !!}
    {!! Form::select('state_id',$states, null, ['class' => 'form-control','id'=>'state_id','onchange'=>"GetSelectedState(this)"]) !!}
</div>

<!-- District Field -->
<div class="form-group col-sm-6">
    {!! Form::label('district_id', 'District:') !!}
    {!! Form::select('district_id', $districts,null, ['class' => 'form-control','id'=>'district_id']) !!}
    {{--    <select name="district_id" id="district_id" class="form-control"></select>--}}


</div>

<!-- Tahasil Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tahasil_id', 'Tahasil:') !!}
    {!! Form::select('tahasil_id', $tahasils, null, ['class' => 'form-control','id'=>'tahasil_id']) !!}
</div>

<!-- Pincode Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pincode', 'Pincode:') !!}
    {!! Form::text('pincode', null, ['class' => 'form-control']) !!}
</div>

<!-- Current Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('current_address', 'Current Address:') !!}
    {!! Form::text('current_address', null, ['class' => 'form-control']) !!}
</div>

<!-- Permission To Enter Field -->
<div class="form-group col-sm-6">
    {!! Form::label('permission_to_enter', 'Permission To Enter:') !!}
    <label class="checkbox-inline">
        {!! Form::radio('permission_to_enter', '1', null,  ['id' => 'present_at_quarantine']) !!}
        YES
    </label>
    <label class="checkbox-inline">
        {!! Form::radio('permission_to_enter', '0', null,  ['id' => 'present_at_quarantine']) !!}
        NO
    </label>
</div>


<!-- Have Medical Certificate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('have_medical_certificate', 'Have Medical Certificate:') !!}
    <label class="checkbox-inline">
        {!! Form::radio('have_medical_certificate', '1', null,  ['id' => 'present_at_quarantine']) !!}
        YES
    </label>
    <label class="checkbox-inline">
        {!! Form::radio('have_medical_certificate', '0', null,  ['id' => 'present_at_quarantine']) !!}
        NO
    </label>
</div>


<!-- Entry Point Field -->
<div class="form-group col-sm-6">
    {!! Form::label('entry_point_id', 'Entry Point:') !!}
    {!! Form::select('entry_point_id',$entryPoints, null, ['class' => 'form-control']) !!}
</div>

<!-- Health Condition Field -->
<div class="form-group col-sm-6">
    {!! Form::label('health_condition', 'Health Condition:') !!}
    {!! Form::text('health_condition', null, ['class' => 'form-control']) !!}
</div>

<!-- Covid Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('covid_status', 'Covid Status:') !!}
    {!! Form::select('covid_status', ['HOME_QUARANTINED'=>'HOME_QUARANTINED','INSTITUTE_QUARANTINED'=>'INSTITUTE_QUARANTINED','POSITIVE'=>'POSITIVE',
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


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('patients.index') }}" class="btn btn-default">Cancel</a>
</div>

@push('scripts')
    <script type="text/javascript">
        function GetSelectedState(state) {
            var stateId = $('#state_id').val();
            //alert(stateId);
            $.ajax({
                url: "{!! url('districts_of_state') !!}/" + stateId,
                method: "GET",
                success: function (data) {
                    console.log(data)
                    $('#district_id').innerHTML = data;
                }
            });
        }
    </script>
@endpush
