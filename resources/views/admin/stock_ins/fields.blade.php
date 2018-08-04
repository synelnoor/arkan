<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>


<!-- Kode Stock Field -->
@if($action == 'edit')
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
@if($action == 'edit')
<div class="form-group col-sm-6">
    {!! Form::label('tgl', 'Tgl:') !!}
    {!! Form::date('tgl', $stockIn->tgl, ['class' => 'form-control']) !!}
</div>
@else
<div class="form-group col-sm-6">
    {!! Form::label('tgl', 'Tgl:') !!}
    {!! Form::date('tgl', @$date, ['class' => 'form-control']) !!}
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
            {!! Form::text('row[0][id]', null, ['class' => 'form-control id ','id'=>'id']) !!}
            {!! Form::text('row[0][id_stock]', null, ['class' => 'form-control id_stock ','id_stock'=>'id_stock']) !!}
            {!! Form::text('row[0][id_logstock]', null, ['class' => 'form-control id_logstock ','id_logstock'=>'id_logstock']) !!}
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

            @if($action == 'edit')
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
                                id_stock:item.id,
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
                  $this.parents('.trbody').find('.form-control.id_stock').val(ui.item.id_stock);
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
            {!! Form::text('row[`+count+`][id]', null, ['class' => 'form-control id ','id'=>'id']) !!}
            {!! Form::text('row[`+count+`][id_stock]', null, ['class' => 'form-control id_stock ','id_stock'=>'id_stock']) !!}
            {!! Form::text('row[`+count+`][id_logstock]', null, ['class' => 'form-control id_logstock ','id_logstock'=>'id_logstock']) !!}
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
       html_code += `@if($action == 'edit')
            <td >
            {!! Form::date('row[`+count+`][tgl]',$stockIn->tgl,['class'=>'form-control tgl  ','id'=>'tgl'])!!}
            </td>
            @else
             <td >
            {!! Form::date('row[`+count+`][tgl]',$date,['class'=>'form-control tgl  ','id'=>'tgl'])!!}
            </td>
            @endif`;
       
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
          console.log('cek')
        $(this).closest('#crud_table').find('tr.trbody').each(function() {
              var row =$(this);
              var value = row.find(".form-control.jml").val();
                  value = !isNaN(parseFloat(value)) && isFinite(value) ? parseFloat(value) : 0;
                  console.log(value);
              
              jumlah += value;
              console.log(jumlah);
              ;
            $( ".form-control.subtotal",row ).val(jumlah.toFixed(1) );
           
          });

        console.log(jumlah);
           $(".form-control.total").val( jumlah.toFixed(1));
          
      }

       function additionalTable()
     {
      var count = parseInt(document.getElementById("countdetail").value);
      count++;
      document.getElementById("countdetail").value = count;
         var html_code = `<tr id='row`+count+`' class='trbody'>`;
       html_code += `<td  style="display: none;">
            {!! Form::text('row[`+count+`][id]', null, ['class' => 'form-control id ','id'=>'id']) !!}
            {!! Form::text('row[`+count+`][id_stock]', null, ['class' => 'form-control id_stock ','id_stock'=>'id_stock']) !!}
            {!! Form::text('row[`+count+`][id_logstock]', null, ['class' => 'form-control id_logstock ','id_logstock'=>'id_logstock']) !!}
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
        jml=0;
       
        for (i = 0; i < details.length; i++) {
            if (i>0)
            {
                additionalTable();
            }
            $("input[name='row["+i+"][id]']").val(details[i]['id']);
            $("input[name='row["+i+"][id_stock]']").val(details[i]['id_stock']);
            $("input[name='row["+i+"][id_logstock]']").val(details[i]['id_logstock']);
            $("input[name='row["+i+"][id_itemstock]']").val(details[i]['id_itemstock']);
            $("input[name='row["+i+"][stock_awal]']").val(details[i]['stock_awal']);
            $("input[name='row["+i+"][stock_akhir]']").val(details[i]['stock_akhir']);

            $("input[name='row["+i+"][nama]']").val(details[i]['nama']);
            $("input[name='row["+i+"][kode]']").val(details[i]['kode']);
            $("input[name='row["+i+"][jml]']").val(details[i]['jml']);
            $("input[name='row["+i+"][tgl]']").val(details[i]['tgl']);
           
            //hitung jumlah
            var val =$("input[name='row["+i+"][jml]']").val();
                val=!isNaN(parseFloat(val)) && isFinite(val) ? parseFloat(val) : 0;
           jml += val;
          $("input[name='row["+i+"][subtotal]']").val(jml);
            
        }
        
        //Triger
        $('#testbtn').click();


        
    }



    });
       
  </script>

@stop