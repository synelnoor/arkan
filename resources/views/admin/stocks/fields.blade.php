<!-- Id Stockin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_stockin', 'Id Stockin:') !!}
    {!! Form::text('id_stockin', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Stockout Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_stockout', 'Id Stockout:') !!}
    {!! Form::text('id_stockout', null, ['class' => 'form-control']) !!}
</div>

<!-- Tgl Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tgl', 'Tgl:') !!}
    {!! Form::text('tgl', null, ['class' => 'form-control']) !!}
</div>

<!-- Jml In Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jml_in', 'Jml In:') !!}
    {!! Form::text('jml_in', null, ['class' => 'form-control']) !!}
</div>

<!-- Jml Out Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jml_out', 'Jml Out:') !!}
    {!! Form::text('jml_out', null, ['class' => 'form-control']) !!}
</div>

<!-- Stock Awal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('stock_awal', 'Stock Awal:') !!}
    {!! Form::text('stock_awal', null, ['class' => 'form-control']) !!}
</div>

<!-- Stock Akhir Field -->
<div class="form-group col-sm-6">
    {!! Form::label('stock_akhir', 'Stock Akhir:') !!}
    {!! Form::text('stock_akhir', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Itemstock Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_itemstock', 'Id Itemstock:') !!}
    {!! Form::text('id_itemstock', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Detailstockin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_detailstockin', 'Id Detailstockin:') !!}
    {!! Form::text('id_detailstockin', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Detailstockout Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_detailstockout', 'Id Detailstockout:') !!}
    {!! Form::text('id_detailstockout', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('stocks.index') !!}" class="btn btn-default">Cancel</a>
</div>
