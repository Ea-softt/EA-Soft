<div class="modal fade large" id="payment_form" tabindex="-1" data-backdrop="static" aria-labelledby="new_warehouselabel"  aria-hidden="true">
    <form action="#" method="post"  id="manage-payments" enctype="multipart/form-data">
          @csrf
  
        <div class="modal-dialog modal-lg mid-large" role="document">      
        <div class="modal-content">
          <div class="modal-header bg-success">           
          <h5 class="modal-title text-white " id="new_warehouselabel">New Payment</h5>
          <button type="button" class="btn-danger btnn"  data-dismiss="modal" aria-label="Close"><span class="fa fa-times"></span></button> <i class=""> 
        </div>
        <div class="modal-body">
        <div class="errMsgCustomer mb-3">   
        </div>
       
       
       


<div class="container-fluid">
   
        <div id="msg"></div> 
        <div class="row">
            <div class="col-lg-6">
        <input type="hidden" name="id" id="id" value="<?php echo isset($id) ? $id : '' ?>">
        

         <div class="form-group">
                <label for="" class="control-label">Batch No/Type of payment/Supplier Name</label>        
           
            <select name="suppliername" id="suppliername" class="custom-select input-sm select2" cols="30" rows="4" required="">
                <option value="">--Select--</option>              
                @foreach ($supplier as $item )
                    <option value="{{ $item->id }}" data-balance="0" data-paid="0">{{ $item->CompanyName }}</option>

                    
                @endforeach 
             
            </select>

            </div>
            <div class="form-group">
            <label for="" class="control-label">Batch no/Invoice no </label>
            <input type="text" class="form-control text-center" name="batchno" id="batchno"  value="<?php echo isset ($batchno)? $batchno :'' ?>" >
        </div>
 
        <div class="form-group">
            <!-- <label for="" class="control-label">Current Payment </label> -->
            <input type="hidden" class="form-control text-right" name="currentpayment" id="currentpayment"  value="" >
        </div>

         <div class="form-group">
            <label for="" class="control-label">Suppliers Current Billing</label>
            <input type="number" class="form-control text-right" name="suppliercurrentbilling" id="suppliercurrentbilling"  value="">
        </div>
       
        </div>
        <div class="col-lg-6">
            
            <div class="form-group">
           <!--  <label for="" class="control-label">Amount paid</label> -->
            <input type="hidden" class="form-control text-right" id="balance"  value="" >
            <input type="hidden" class="form-control text-right" id="amountpaid" name="amountpaid" value="" >
        </div>

         <div class="form-group">
            <label for="" class="control-label">Amount Payable</label>
            <input type="hidden" class="form-control text-right" name="" id="amountt"  value="<?php echo isset ($amountpayable)? $amountpayable :'' ?>" >
            <input type="number" class="form-control text-right" name="amountpayable" id="amountpayable"  value="<?php echo isset($amount) ? number_format($amount) :0 ?>" readonly >
        </div>

         <div class="form-group">           
            <label for="" class="control-label">Remarks</label>
            <textarea name="remark" id="" cols="10" rows="3" class="form-control" ></textarea>

        </div>


        </div>

        
       </div> 

</div>

   







</div>




          
<!-- </div> -->
<div class="modal-footer">
    <button type="submit" class="btn btnn btn-primary add_warehouse_btn" id='add_warehouse_btn'><i class="fas fa-thumbs-up">&nbsp&nbsp</i>Save</button>
    <button type="button" class="btn btnn btn-danger" data-dismiss="modal"><i class="fas fa-ban">&nbsp&nbsp</i>Cancel</button>
</div>

</form>
</div>





<style>
    img#cimg{
        max-height: 30vh;
        max-width: 15vw;
    }
</style>
<script>








   $.ajaxSetup({
       headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
     });






    $('.select2').select2({
        placeholder:'Please select here',
        width:'100%'
    })

    $(document).ready(function(){
   var x = Number($("#currentpayment").val());
 

  })

    $('#supppliername').change(function(){
        
        var amount= $('#supppliername option[value="'+$(this).val()+'"]').attr('data-balance');
        
        $('#currentpayment').val(parseFloat(amount).toLocaleString('en-US',{style:'decimal',maximumFractionDigits:2,minimumFractionDigits:2}))
        

    var amountt= $('#supppliername option[value="'+$(this).val()+'"]').attr('data-paid')
        
        $('#suppliercurrentbilling').val(amountt);

        var b = $("#batchno").val();
        //alert (b);
        //$("#suppliercurrentbilling").val(amountt);


    })
     $("#cost, #quantity").keyup(function(){
    var multtotal1 = 0;
    var x = Number($("#cost").val());
    var y = Number($("#quantity").val());
    var multtotal1= x * y;

 $("#tcost").val(multtotal1);

});

    $("#currentpayments").keyup(function(){
    var multtotal1 = 0;
    var multtotal2 = 0;
    var x = Number($("#currentpayment").val());
    var y = Number($("#balance").val());
    var z = Number($("#amountt").val());
    var multtotal1= x + y;
    var multtotal2= z - x;


 $("#amountpaid").val(multtotal1);
 $("#amountpayable").val(multtotal2);

});

    $("#suppliercurrentbilling").keyup(function(){
    
    var multtotal3 = 0;
    var multtotal4 = 0;
    var multtotal5 = 0;
    var x = Number($("#suppliercurrentbilling").val());
    
    var z = Number($("#amountt").val());
    
    var multtotal3= z + x;


 
 $("#amountpayable").val(multtotal3);
  $("#currentpayment").val(multtotal4);
  $("#amountpaid").val(multtotal5);
});



    $('#manage-payments').submit(function(e){
        e.preventDefault()
        start_load()   
        
        $.ajax({
            url:'{{ route('add.payments') }}',
            method:'POST',
            data:$(this).serialize(),
            _token: '{{ csrf_token() }}',
            error:err=>{
                console.log(err)
                end_load()
            },

         success:function(resp){
                alert(resp);
                
                if(resp == 1){
                    alert_toast("Data successfully saved.",'success')
                        /*setTimeout(function(){
                            var nw = window.open('receipt.php?ef_id='+resp.ef_id+'&pid='+resp.pid,"_blank","width=900,height=600")
                            setTimeout(function(){
                                nw.print()*/
                                setTimeout(function(){
                                    /*nw.close()*/
                                    location.reload()
                                },500)
                            /*},500)
                        },500)*/
                }
            }
        })
    })





























   
$("#new_warehouse_form").submit(function(e){ 
  e.preventDefault();
  

  const fd = new FormData(this);
  $("#add_warehouse_btn").text('Loading...');
    
  $.ajax({
   url: '{{ route('add.warehouse') }}',
   method: 'post',
   data: fd,
   cache: false,
   dataType:false,
   processData:false,
   contentType:false,
   beforeSend:function(){
    $(new_warehouse_form).find('span.error-text').text();},
   success:function(resp){   
     if(resp.status == 0){
     $.each(resp.error, function(prefix,val){
        $(new_supplier_form).find('span.'+prefix+'_error').text(val[0]);
        $("#add_warehouse_btn").text('Save');
      });    
    }else{     
      Swal.fire(
        'Added',
        'Warehouse Added Successfully!',
        'success'
      )
     $("#add_warehouse_btn").text('Save');    
     $("#new_warehouse_form")[0].reset();
     $('#new_warehouse').modal('hide');
     setTimeout(function(){
       location.reload()
       },1000)
    // $('.table').load(location.href+' .table')
    }
   }
 })
  
});














</script>