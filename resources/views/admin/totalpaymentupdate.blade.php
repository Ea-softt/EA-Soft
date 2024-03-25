<div class="modal fade large" id="payment_order" tabindex="-1" data-backdrop="static" aria-labelledby="payment_orders"  aria-hidden="true">
    <form action="#" method="post"  id="manage-payment" enctype="multipart/form-data">
          @csrf
  
        <div class="modal-dialog modal-lg mid-large" role="document">      
        <div class="modal-content">
          <div class="modal-header bg-success">           
          <h5 class="modal-title text-white " id="payment_orders">Payment Order</h5>
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
                <option value="" selected value="{{ $item->id }}">{{ $item->CompanyName }}</option>              
              
                    <option value="{{ $item->id }}" >{{ $item->CompanyName }}</option>

                    
                @endforeach 
             
            </select>

            </div>
            <div class="form-group">
            <label for="" class="control-label">Batch no/Invoice no </label>
            <input type="text" class="form-control text-center" name="batchno" id="batchno"  value="<?php echo isset ($batchno)? $batchno :'' ?>" >
        </div>
 
        <div class="form-group">
           <label for="" class="control-label">Current Payment </label> 
            <input type="text" class="form-control text-center" name="currentpayment" id="currentpayment"  value="" >
        </div>

         <div class="form-group">
            <label for="" class="control-label">Suppliers Current Billing</label>
            <input type="hidden" class="form-control text-right" name="suppliercurrentbilling" id="suppliercurrentbilling"  value="" >
        </div> 
       
        </div>
        <div class="col-lg-6">
            
            <div class="form-group">
          <label for="" class="control-label">Amount paid</label>
            <input type="hidden" class="form-control text-center" id="balance"  value="">
            <input type="number" class="form-control text-center" id="amountpaid" name="amountpaid" value="" readonly >
        </div>

         <div class="form-group">
            <label for="" class="control-label">Amount Payable</label>
            <input type="hidden" class="form-control text-center" name="" id="amountt"  value="" >
            <input type="number" class="form-control text-center" name="amountpayable" id="amountpayable"  value="" readonly >
        </div>

         <div class="form-group">           
            <label for="" class="control-label">Remarks</label>
            <textarea name="remark" id="remarks" cols="10" rows="3" class="form-control" ></textarea>

        </div>


        </div>

        
       </div> 
   


     

</div>

           
<!-- </div> -->
<div class="modal-footer">
    <button type="submit" class="btn btnn btn-primary add_warehouse_btn" id='payment_btn'><i class="fas fa-thumbs-up">&nbsp&nbsp</i>Update</button>
    <button type="button" class="btn btnn btn-danger" data-dismiss="modal"><i class="fas fa-ban">&nbsp&nbsp</i>Cancel</button>
</div>


</div>
</div>
</div>
</form>
</div>




          
<!-- </div> -->






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

//adding suppliercurrentbilling



//making payment order
 $("#currentpayment").keyup(function(){
    var multtotal1 = 0;
    var multtotal2 = 0;
    var multtotal3 = 0;
    var x = Number($("#currentpayment").val());
    var y = Number($("#balance").val());
    var z = Number($("#amountt").val());

if( x != null ){

     var multtotal1= x + y;
    var multtotal2= z - x;

    $("#amountpaid").val(multtotal1);
    $("#amountpayable").val(multtotal2);
     $("#suppliercurrentbilling").val(multtotal3);

}else{
    return;
}

});



 $('#manage-payment').submit(function(e){
        e.preventDefault()
        start_load()   
        $("#payment_btn").text('Updating....');
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
                //alert(resp);
                
                if(resp == 1){
                    alert_toast("Data successfully saved.",'success')
                        
                      setTimeout(function(){                   
                     
                       location.reload()
                       },600) 
                                                
                }
            }
        })
    })


   
</script>