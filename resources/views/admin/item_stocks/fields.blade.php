<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>

<!-- Kode Stock Field -->
@if($action === 'edit')
<div class="form-group col-sm-6">
    {!! Form::label('kode_stock', 'Kode Stock:') !!}
    {!! Form::text('kode_stock',$itemStock->kode_stock, ['class' => 'form-control','readonly']) !!}
</div>
@else
<div class="form-group col-sm-6">
    {!! Form::label('kode_stock', 'Kode Stock:') !!}
    {!! Form::text('kode_stock',$code, ['class' => 'form-control','readonly']) !!}
</div>
@endif

<!-- Satuan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('satuan', 'Satuan:') !!}
    {!! Form::text('satuan', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('itemStocks.index') !!}" class="btn btn-default">Cancel</a>
</div>



@section('scripts')
<script>
    $(document).ready(function(){
        var action = '{!! $action!!}';
       
    });
    
</script>
@endsection