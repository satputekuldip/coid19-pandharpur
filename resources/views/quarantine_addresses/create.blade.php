@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Quarantine Address
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'quarantineAddresses.store']) !!}

                        @include('quarantine_addresses.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
