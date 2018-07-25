<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>


<!-- Kode Stock Field -->
@if($action === 'edit')
<div class="form-group col-sm-6">
    {!! Form::label('kode', 'Kode:') !!}
    {!! Form::text('kode',$stockIn->kode, ['class' => 'form-control','readonly']) !!}
</div>
@else
<div class="form-group col-sm-6">
    {!! Form::label('kode', 'Kode Stock:') !!}
    {!! Form::text('kode',$code, ['class' => 'form-control','readonly']) !!}
</div>
@endif


<!-- Tgl Field -->
@if($action === 'edit')
<div class="form-group col-sm-6">
    {!! Form::label('tgl', 'Tgl:') !!}
    {!! Form::date('tgl', $stockIn->tgl, ['class' => 'form-control']) !!}
</div>
@else
<div class="form-group col-sm-6">
    {!! Form::label('tgl', 'Tgl:') !!}
    {!! Form::date('tgl', $date, ['class' => 'form-control']) !!}
</div>
@endif



<div class="form-group col-sm-12" style="overflow:hidden;">
    <div class="box-body table-responsive no-padding"  >
      <table class="table table-bordered" id="crud_table" border="3">
            <thead style="background-color: #017d78;color: #fff;">
               
                <th>Nama Barang</th>
                <th>Kode Barang</th>
                <th>Qty</th>
                <th>Tanggal</th>
                <th>total</th>
                <th>Aksi</th>
            </thead>
          <tr class="trbody">
            
            <td  style="display: none;">
            {!! Form::text('row[0][id]', null, ['class' => 'form-control id ','id'=>'id']) !!}
            {!! Form::text('row[0][id_itemstock]', null, ['class' => 'form-control id_itemstock search_text ','id'=>'id_itemstock']) !!}
            {!! Form::text('row[0][stock_awal]', null, ['class' => 'form-control stock_awal search_text ','id'=>'stock_awal']) !!}
             {!! Form::text('row[0][stock_akhir]', null, ['class' => 'form-control stock_akhir search_text ','id'=>'stock_akhir']) !!}
            </td>
            <td  >
            {!! Form::text('row[0][nama]', null, ['class' => 'form-control nama search_text ','id'=>'nama','autocomplete="off"']) !!}
            </td>
            <td>
            {!! Form::text('row[0][kode]',null,['class'=>'form-control kode search_text ','id'=>'kode','readonly']) !!}
            </td>

            <td >
            {!! Form::text('row[0][jml]',null,['class'=>'form-control jml','id'=>'jml' ,'autocomplete="off"'])!!}
            </td>

            @if($action === 'edit')
            <td >
            {!! Form::date('row[0][tgl]',$stockIn->tgl,['class'=>'form-control tgl  ','id'=>'tgl'])!!}
            </td>
            @else
             <td >
            {!! Form::date('row[0][tgl]',$date,['class'=>'form-control tgl  ','id'=>'tgl'])!!}
            </td>
            @endif

            <td>
            {!! Form::text('row[0][subtotal]',null,['class'=>'form-control subtotal ','id'=>'subtotal','readonly'])!!}
            </td>
              <td>
              <button type='button' id="testbtn" name='test' class='btn btn-danger btn-xs test' style="display:none;">
                <i class='fa fa-trash'></i></button>
              </td>
          </tr>

    </table>
     <div>
     <button type="button" name="add" id="add" class="btn btn-success btn-xs">+</button>
    </div>

    </div>
    <br />
          
    </div>
</div>


<!-- Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total', 'Total:') !!}
    {!! Form::text('total', null, ['class' => 'form-control total','readonly']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <input type="hidden" id="action" value = "{!!@$action!!}" />
      <input type="hidden" id="countdetail" value = "0" />
      {!! Form::hidden('delete_row',null, ['class' => 'form-control','id'=>'delete_row'] ) !!}
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('stockIns.index') !!}" class="btn btn-default">Cancel</a>
</div>

<?php 

$listoutcode = json_encode(@$outcode);
$listinitems = json_encode(@$data);

?>

@section('scripts')
 <script>
  
    $(document).on('input', '.search_text', function() {
        // console.log("test")
        src = "{{ route('searchajaxStockin') }}";
//console.log(this)
        $(this).autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: src,
                        dataType: "json",
                        data: {
                            term : request.term
                        },
                        success: function(data) {
                            response($.map(data,function(item){
                              return{
                                value:item.value+","+item.kode,
                                nama:item.value,
                                id:item.id,
                                id_itemstock:item.id_itemstock,
                                kode:item.kode,
                                stock_awal:item.stock_awal,
                                stock_akhir:item.stock_akhir
                              }
                            }));
                          },
                    });
                },
                minLength: 2,
               select: function(event,ui){
                if(ui.item){
                  $this=$(this);
               
                  $this.val(ui.item.nama);
                  $this.parents('.trbody').find('.form-control.kode').val(ui.item.kode);
                  $this.parents('.trbody').find('.form-control.id').val(ui.item.id);
                  $this.parents('.trbody').find('.form-control.id_itemstock').val(ui.item.id_itemstock);
                   $this.parents('.trbody').find('.form-control.stock_awal').val(ui.item.stock_awal);
                   $this.parents('.trbody').find('.form-control.stock_akhir').val(ui.item.stock_akhir);
                  
                  return false;
                  }
                 }
              });
  
  });
       
   </script>

   <!--add row new -->
  <script>
    $(document).ready(function(){
     //var count = 0;

    var action = document.getElementById("action");

     $('#add').click(function(){
       var count = parseInt(document.getElementById("countdetail").value);
       console.log(count)
       count++;   
      document.getElementById("countdetail").value = count;

      var html_code = `<tr id='row`+count+`' class='trbody'>`;
       html_code += `<td  style="display: none;">
            {!! Form::text('row[`+count+`][id]', null, ['class' => 'form-control id ','id'=>'id']) !!}
            {!! Form::text('row[`+count+`][id_itemstock]', null, ['class' => 'form-control id_itemstock search_text ','id'=>'id_itemstock']) !!}
            {!! Form::text('row[`+count+`][stock_awal]', null, ['class' => 'form-control stock_awal search_text ','id'=>'stock_awal']) !!}
             {!! Form::text('row[`+count+`][stock_akhir]', null, ['class' => 'form-control stock_akhir search_text ','id'=>'stock_akhir']) !!}
            </td>`;

       html_code += ` <td>
            {!! Form::text('row[`+count+`][nama]', null, ['class' => 'form-control nama search_text ','id'=>'nama','autocomplete="off"']) !!}
            </td>`;
       html_code += `<td>
            {!! Form::text('row[`+count+`][kode]',null,['class'=>'form-control kode search_text ','id'=>'kode','readonly']) !!}
            </td>`;
       html_code += `<td >
            {!! Form::text('row[`+count+`][jml]',null,['class'=>'form-control jml','id'=>'jml','autocomplete="off"'])!!}
            </td>`;
       html_code += `<td >
            {!! Form::date('row[`+count+`][tgl]',$date,['class'=>'form-control tgl  ','id'=>'tgl'])!!}
            </td>`;
       
      html_code +=`<td>
            {!! Form::text('row[`+count+`][subtotal]',null,['class'=>'form-control subtotal ','id'=>'subtotal','readonly'])!!}
            </td>`
       html_code += "<td><button type='button' name='remove' data-row='row"+count+"' class='btn btn-danger btn-xs remove'>-</button></td>";   
       html_code += "</tr>";  
       $('#crud_table').append(html_code);

       //console.log(count)
      
     });
     
      $(document).on('click', '.remove', function(){
        var delete_row = $(this).closest("table");
        var a = $(this).parents('tr').find('.id').val();
       
        var deleted = document.getElementById("delete_row");
      
        if (a != '')
        {
          if (deleted.value == '')
          {
          deleted.value = a;
          }
          else
          {
          deleted.value += '|'+a;
          }
           
        }


        $(this).parents('tr').remove();
        
         reCalculate.call(delete_row);
       });

       $(document).on('click', '#test', function(){
        var row = $(this).closest("table");
         reCalculate.call(row);
       });


     
// <!-- auto hitung -->
    $('#crud_table').on("keyup", "tr", reCalculate);
     // console.log($data)

    var action = '<?php echo @$action; ?>';
            if (action == 'edit')
            {
                
                insertDetail();
            }
      function reCalculate() {
          var grandTotal = 0;
          var grandLaba=0;
          var jumlah=0;
        $(this).closest('#crud_table').find('tr.trbody').each(function() {
              var row =$(this);
              var value = row.find(".form-control.jml").val();
                  value = !isNaN(parseFloat(value)) && isFinite(value) ? parseFloat(value) : 0;
                  console.log(value);
              // var value2 = row.find(".form-control.harga").val();
              // value2 = !isNaN(parseFloat(value2)) && isFinite(value2)  ? parseInt(value2) : 0;
              // var value3 = row.find(".form-control.harga_beli").val();
              // value3 = !isNaN(parseFloat(value3)) && isFinite(value3) ? parseInt(value3):0;
              
              // var total = value * value2;
              // var laba = value * value3;
              // console.log(total);
              jumlah += value;
              console.log(jumlah);
              // grandTotal += total;
              // grandLaba += laba;
            $( ".form-control.subtotal",row ).val(jumlah.toFixed(1) );
           
          });

          // $(".form-control.jumlah").val(jumlah);
           $(".form-control.total").val( jumlah.toFixed(1));
          // $(".form-control.totalLaba").val(grandLaba.toFixed(2));
      }

       function additionalTable()
     {
      var count = parseInt(document.getElementById("countdetail").value);
      count++;
      document.getElementById("countdetail").value = count;
         var html_code = `<tr id='row`+count+`' class='trbody'>`;
       html_code += `<td  style="display: none;">
            {!! Form::text('row[`+count+`][id]', null, ['class' => 'form-control id ','id'=>'id']) !!}
            {!! Form::text('row[`+count+`][id_itemstock]', null, ['class' => 'form-control id_itemstock search_text ','id'=>'id_itemstock']) !!}
            {!! Form::text('row[`+count+`][stock_awal]', null, ['class' => 'form-control stock_awal search_text ','id'=>'stock_awal']) !!}
             {!! Form::text('row[`+count+`][stock_akhir]', null, ['class' => 'form-control stock_akhir search_text ','id'=>'stock_akhir']) !!}
            </td>`;

       html_code += ` <td>
            {!! Form::text('row[`+count+`][nama]', null, ['class' => 'form-control nama search_text ','id'=>'nama','autocomplete="off"']) !!}
            </td>`;
       html_code += `<td>
            {!! Form::text('row[`+count+`][kode]',null,['class'=>'form-control kode search_text ','id'=>'kode','readonly']) !!}
            </td>`;
       html_code += `<td >
            {!! Form::text('row[`+count+`][jml]',null,['class'=>'form-control qty','id'=>'jml','autocomplete="off"'])!!}
            </td>`;
       html_code += `<td >
            {!! Form::date('row[`+count+`][tgl]',null,['class'=>'form-control tgl  ','id'=>'tgl'])!!}
            </td>`;
       
      html_code +=`<td>
            {!! Form::text('row[`+count+`][subtotal]',null,['class'=>'form-control subtotal ','id'=>'subtotal','readonly'])!!}
            </td>`
       html_code += "<td><button type='button' name='remove' data-row='row"+count+"' class='btn btn-danger btn-xs remove'>-</button></td>";   
       html_code += "</tr>";  
       $('#crud_table').append(html_code);
     }

 function insertDetail()
    {
        
        details = <?php echo $listinitems; ?>;
       
       
        for (i = 0; i < details.length; i++) {
            if (i>0)
            {
                additionalTable();
            }
            $("input[name='row["+i+"][id]']").val(details[i]['id']);
            $("input[name='row["+i+"][barang_id]']").val(details[i]['barang_id']);
            $("input[name='row["+i+"][nama_barang]']").val(details[i]['nama_barang']);
            $("input[name='row["+i+"][code_barang]']").val(details[i]['code_barang']);
            $("input[name='row["+i+"][qty]']").val(details[i]['qty']);
            $("input[name='row["+i+"][harga]']").val(details[i]['harga']);
            $("input[name='row["+i+"][harga_beli]']").val(details[i]['harga_beli']);
            $("input[name='row["+i+"][subtotal]']").val(details[i]['subtotal']);
            $("input[name='row["+i+"][laba]']").val(details[i]['laba']);
            $("input[name='row["+i+"][toko_id]']").val(details[i]['toko_id']);
            $("input[name='row["+i+"][kategori_id]']").val(details[i]['kategori_id']);
            $("input[name='row["+i+"][order_id]']").val(details[i]['order_id']);
            //$("input[name='row["+i+"][total_individual]']").val(details[i]['unit_price']*details[i]['qty']);
        }


        $('#testbtn').click();



        
    }



    });
       
  </script>

@stop