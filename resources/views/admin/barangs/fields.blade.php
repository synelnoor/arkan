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

<div class="code">
@if($action === 'edit')
<!-- toko_id -->
<div class="form-group col-sm-6">
     {!! Form::label('toko_id','Toko :') !!}
    <!-- {!! Form::select('toko_id',$toko->pluck('name','id'),null, ['class' => 'form-control toko']) !!} -->
    <select name="toko_id" class="form-control toko" id="toko_id">
            <option value="{{$barang->toko->id}}">{{ $barang->toko->name }}</option>
            @foreach($toko as $tokos)
            <option value="{{ $tokos->id }}">{{ $tokos->name }}</option>
            @endforeach
    </select>
</div>
@else
<!-- toko_id -->
<div class="form-group col-sm-6">
     {!! Form::label('toko_id','Toko :') !!}
    <select name="toko_id" class="form-control toko" id="toko_id">
            <option selected disabled>Silakan Pilih Toko</option>
            @foreach($toko as $tokos)
            <option value="{{ $tokos->id }}">{{ $tokos->name }}</option>
            @endforeach
    </select>
</div>
@endif



@if($action ==='edit')
<!-- kategori_id -->

<div class="form-group col-sm-6">
    {!! Form::label('kategori_id','Kategori :') !!}
    <select name="kategori_id" class="form-control kategori" id="kategori_id">
            {{--<option value="{{$barang->kategori->id}}">{{$barang->kategori->name}}</option>--}}
            @foreach($kategori as $kategoris)
            <option value="{{ $kategoris->id }}">{{ $kategoris->name }}</option>
            @endforeach
    </select>
</div>
@else
<!-- kategori_id -->
<div class="form-group col-sm-6">
    {!! Form::label('kategori_id','Kategori :') !!}

    <select name="kategori_id" class="form-control kategori" id="kategori_id">
            <option selected disabled>Silakan Pilih Kategori</option>
            @foreach($kategori as $kategoris)
            <option value="{{ $kategoris->id }}">{{ $kategoris->name }}</option>
            @endforeach
    </select>
</div>
@endif

<!-- Code Barang Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code_barang', 'Code Barang:') !!}
    {!! Form::text('code_barang', null, ['class' => 'form-control code','readonly']) !!}
</div>

</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('barangs.index') !!}" class="btn btn-default">Cancel</a>
</div>


@section('scripts')
<script>
    $(document).ready(function(){
        var action = '{!! $action!!}';
        var to     = {!! @$toko !!};
       
       //for edit condition
        var code = $('.form-control.code').val();
        var parse = code.replace( /\D+/g, '')
       //
        $('.code').on('change',function(){
            if(action == 'create')
                {
                        var conbar      = {!! @$barcode !!};
                        var toko        = $('.form-control.toko').val();
                        var realArray   = $.makeArray( to );
                        $.map(realArray, function( id, val ) {
                         
                        if(toko == id.id)
                            {
                                
                                 $('.form-control.code').val(id.code+conbar);
                                
                            }
                       
                        });
                        
                }

                if(action == 'edit')
                {
                    
                        var toko = $('.form-control.toko').val();
                        
                        var realArray   = $.makeArray( to );
                        $.map(realArray, function( id, val ) {
                         
                        if(toko == id.id)
                            {
                                
                                 $('.form-control.code').val(id.code+parse);
                                
                            }
                       
                        });
                        
                        
                }
        });
        
    });
    
</script>
@endsection

