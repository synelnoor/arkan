<!-- Nama Barang Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_barang', 'Nama Barang:') !!}
    {!! Form::text('nama_barang', null, ['class' => 'form-control']) !!}
</div>

<!-- Harga Beli Field -->
<div class="form-group col-sm-6">
    {!! Form::label('harga_beli', 'Harga Beli:') !!}
    {!! Form::number('harga_beli', null, ['class' => 'form-control']) !!}
</div>

<!-- Harga-Jual Field -->
<div class="form-group col-sm-6">
    {!! Form::label('harga_jual', 'Harga Jual:') !!}
    {!! Form::number('harga_jual', null, ['class' => 'form-control']) !!}
</div>

<!-- Code Barang Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code_barang', 'Code Barang:') !!}
    {!! Form::text('code_barang', null, ['class' => 'form-control code']) !!}
</div>


<!-- kategori_id -->
<div class="form-group col-sm-6">
    {!! Form::label('kategori_id','Kategori :') !!}
    {!! Form::select('kategori_id',$kategori->pluck('name','id'),null, ['class' => 'form-control select2']) !!}
</div>
<!-- toko_id -->
<div class="form-group col-sm-6">
     {!! Form::label('toko_id','Toko :') !!}
    <!-- {!! Form::select('toko_id',$toko->pluck('name','id'),null, ['class' => 'form-control toko']) !!} -->
    <select name="toko_id" class="form-control toko" id="toko_id">
            <option selected disabled>Please select one option</option>
            @foreach($toko as $tokos)
            <option value="{{ $tokos->id }}">{{ $tokos->name }}</option>
            @endforeach
    </select>
    

</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('barangs.index') !!}" class="btn btn-default">Cancel</a>
</div>

@section('scripts')
<script>
    $(document).on('change',function(){
        var toko = $('.form-control.toko').val();
        
        console.log(toko);
        if(toko === '1')
        {
            console.log('true');
            $('.form-control.code').val('SC');
        }
        if(toko ==='2')
        {
            $('.form-control.code').val('MAB');
        }
       

    });
    
</script>
@endsection

