<!-- Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type', 'Quarantine Type:') !!}
    {!! Form::select('type', ['INSTITUTE'=>'INSTITUTE','HOME'=>'HOME'] ,null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Institute/House Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', 'Phone:') !!}
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
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

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', 'Address:') !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>

<!-- Pincode Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pincode', 'Pincode:') !!}
    {!! Form::text('pincode', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('quarantineAddresses.index') }}" class="btn btn-default">Cancel</a>
</div>
