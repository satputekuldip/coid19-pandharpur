@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Patient
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'quarantinePatients.store_institute_quarantine_patient']) !!}

                        @include('quarantine_patients.institute_fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
