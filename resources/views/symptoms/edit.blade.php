@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Symptom
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($symptom, ['route' => ['symptoms.update', $symptom->id], 'method' => 'patch']) !!}

                        @include('symptoms.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection