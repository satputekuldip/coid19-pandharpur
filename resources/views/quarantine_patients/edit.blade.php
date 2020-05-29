@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Quarantine Patient
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($quarantinePatient, ['route' => ['quarantinePatients.update', $quarantinePatient->id], 'method' => 'patch']) !!}

                        @include('quarantine_patients.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection