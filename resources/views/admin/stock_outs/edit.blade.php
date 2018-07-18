@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Stock Out
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($stockOut, ['route' => ['stockOuts.update', $stockOut->id], 'method' => 'patch']) !!}

                        @include('admin.stock_outs.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection