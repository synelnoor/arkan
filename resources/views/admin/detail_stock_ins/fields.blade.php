<!-- Id Stockin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_stockin', 'Id Stockin:') !!}
    {!! Form::text('id_stockin', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Itemstock Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_itemstock', 'Id Itemstock:') !!}
    {!! Form::text('id_itemstock', null, ['class' => 'form-control']) !!}
</div>

<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>

<!-- Kode Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kode', 'Kode:') !!}
    {!! Form::text('kode', null, ['class' => 'form-control']) !!}
</div>

<!-- Tgl Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tgl', 'Tgl:') !!}
    {!! Form::text('tgl', null, ['class' => 'form-control']) !!}
</div>

<!-- Jml Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jml', 'Jml:') !!}
    {!! Form::text('jml', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('detailStockIns.index') !!}" class="btn btn-default">Cancel</a>
</div>
