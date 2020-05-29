@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tahsil
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($tahsil, ['route' => ['tahsils.update', $tahsil->id], 'method' => 'patch']) !!}

                        @include('tahsils.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection