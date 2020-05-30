{!! Form::hidden('patient_id',  $quarantinePatientId ?? null) !!}


{{--
@push('scripts')
    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function () {
            $('#js-example-basic-single').select2();
        });
    </script>
@endpush
--}}


{!! Form::hidden('checked_at', date('Y-m-d')) !!}


{{--@push('scripts')
    <script type="text/javascript">
        $('#checked_at').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: false
        })
    </script>
@endpush--}}


<div class="form-group col-sm-6">
    {!! Form::label('symptoms', 'Symptoms:') !!}

    {{--<textarea id="input-custom-dropdown" name='symptoms' required
              placeholder='write some Symptoms'></textarea>--}}
    {!! Form::textarea('symptoms', null, ['class' => 'form-control','id'=>'input-custom-dropdown','required','placeholder'=>'write some Symptoms']) !!}
</div>

<!-- Remarks Field -->
<div class="form-group col-sm-8 col-lg-8">
    {!! Form::label('remarks', 'Remarks:') !!}
    {!! Form::text('remarks', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('attendances.index') }}" class="btn btn-default">Cancel</a>
</div>
@section('css')
    <link rel="stylesheet" href="{{ asset('css/tagify.css') }}">
    <style>
        .tags-look .tagify__dropdown__item {
            display: inline-block;
            border-radius: 3px;
            padding: .3em .5em;
            border: 1px solid #CCC;
            background: #F3F3F3;
            margin: .2em;
            font-size: .85em;
            color: black;
            transition: 0s;
        }

        .tags-look .tagify__dropdown__item--active {
            color: black;
        }

        .tags-look .tagify__dropdown__item:hover {
            background: lightyellow;
            border-color: gold;
        }
    </style>
@endsection

@push('scripts')
    <script src="{{ asset('js/tagify.min.js') }}"></script>
    <script src="{{ asset('js/tagify.polyfills.min.js') }}"></script>
    <script src="{{ asset('js/jQuery.tagify.min.js') }}"></script>

    <script>
        $(function () {
            var input = document.getElementById('input-custom-dropdown'),
                // init Tagify script on the above inputs
                tagify = new Tagify(input, {
                    whitelist: {!! "['". implode("','",$symptoms) . "']" !!},
                    maxTags: 40,
                    dropdown: {
                        maxItems: 20,           // <- mixumum allowed rendered suggestions
                        classname: "tags-look", // <- custom classname for this dropdown, so it could be targeted
                        enabled: 0,             // <- show suggestions on focus
                        closeOnSelect: input.innerText == "None"    // <- do not hide the suggestions dropdown once an item has been selected
                    }
                });
        });


    </script>
@endpush
