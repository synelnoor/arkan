@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Log Stock
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($logStock, ['route' => ['logStocks.update', $logStock->id], 'method' => 'patch']) !!}

                        @include('log_stocks.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection