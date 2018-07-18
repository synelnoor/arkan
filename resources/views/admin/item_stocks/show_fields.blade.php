<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $itemStock->id !!}</p>
</div>

<!-- Nama Field -->
<div class="form-group">
    {!! Form::label('nama', 'Nama:') !!}
    <p>{!! $itemStock->nama !!}</p>
</div>

<!-- Kode Stock Field -->
<div class="form-group">
    {!! Form::label('kode_stock', 'Kode Stock:') !!}
    <p>{!! $itemStock->kode_stock !!}</p>
</div>

<!-- Satuan Field -->
<div class="form-group">
    {!! Form::label('satuan', 'Satuan:') !!}
    <p>{!! $itemStock->satuan !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $itemStock->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $itemStock->updated_at !!}</p>
</div>

