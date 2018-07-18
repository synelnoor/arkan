@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Detail Stock In
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($detailStockIn, ['route' => ['detailStockIns.update', $detailStockIn->id], 'method' => 'patch']) !!}

                        @include('detail_stock_ins.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection