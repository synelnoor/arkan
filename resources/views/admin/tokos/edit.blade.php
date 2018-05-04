@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Toko
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($toko, ['route' => ['tokos.update', $toko->id], 'method' => 'patch']) !!}

                        @include('admin.tokos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection