<div class="modal fade small" id="payment_order" tabindex="-1" data-backdrop="static" aria-labelledby="payment_orders"  aria-hidden="true">
    <form action="#" method="post"  id="manage-payment" enctype="multipart/form-data">
          @csrf
  
       <div class="modal-dialog modal-lg small" role="document">      
        <div class="modal-content">
          <div class="modal-header bg-success">           
        <h5 class="modal-title text-white " id="payment_orders">Product Update</h5>   
          <button type="button" class="btn-danger btnn"  data-dismiss="modal" aria-label="Close"><span class="fa fa-times"></span></button> <i class=""> 
        </div>
        <div class="modal-body">
        <div class="errMsgCustomer mb-3">   
        </div>
       
       
       
       <div class="d-flex col-sm-7 flex-wrap flex-md-nowrap align-items-center mb-2 pb-3 border-bottom">
         <label for="companynameid" class="">Company Name:</label>
       <select name="companynameid" id="companynameid pt-5" class="custom-select input-sm select2"  required="" cols="30" rows="4"> 
            <option selected="" ></option>

                @foreach ($supplier as $item )
                 <option value="" selected value="{{ $item->id }}">{{ $item->CompanyName }}</option> 
                    <option value="{{ $item->id }}">{{ $item->CompanyName }}</option>                    
                @endforeach           
                                      
            </select>
        
      </div>


        
     <div class="row "> 
    
           

 
    <br>
   <br>
    <br>
    <br>
    <div class="col-sm-7 border-right">

    <div class="form-group">
    <input type="hidden" name="sid" id="sid" class="form-control-sm form-control" value="" readonly="">
     </div>


        <div class="form-group">
          <label class="">Product Name:</label>
          <input class="form-control"  type="text" id="name" name="name" placeholder="Product Name"  value="">          
          <span class="text-danger error-text fullName_error"></span>
        </div>

                     
        <div class="form-group">
          <label class="" valign="baseline">Quantity:</label>
          <input class="form-control"  type="text" id="quantity2" name="quantity" placeholder="Quantity"  value="">          
          <span class="text-danger error-text number_error"></span>
        </div>
             
        


        <div class="form-group">
          <label class="">price:</label>
          <input class="form-control"  type="text" id="price2" name="price" placeholder="price"  value="">
         <span class="text-danger  error-text address_error"></span>
        </div>

      

                  
        <div class="form-group">
          <label class="" valign="baseline">Total Cost:</label>
          <input class="form-control"  type="text" id="multtotal2" name="multtotal" placeholder="Total Cost"  readonly value="">         
          <span class="text-danger error-text number_error"></span>
        </div>
        
        <div class="form-group">
          <label class="" valign="baseline">unit:</label>
          <input class="form-control"  type="text" id="unit" name="unit" placeholder="unit"  value="">          
          <span class="text-danger error-text number_error"></span>
        </div>

        <div class="form-group">
          <label class="" valign="baseline">Description:</label>
          <input class="form-control"  type="text" id="description" name="description" placeholder="Description"  value="">         
          <span class="text-danger error-text number_error"></span>
        </div>

        <div class="form-group">
          <label class="" valign="baseline">Expiring Date:</label>
          <input class="form-control"  type="text" id="expire_date" name="expire_date" placeholder="Expiring Date"  value="<?php isset ($Employer)? $Employer :''?>">           
          <span class="text-danger error-text number_error"></span>
        </div>
     </div>


    <div class="col-lg-5">
            

         

        <div class="form-group">
        <img src="<?php echo isset($meta['picture']) ? 'img/'.$meta['picture'] :'' ?>" alt="" id="cimg">     
        </div>

        
         <div class="form-group">
        <label for="" class="control-label">Image of item</label>
         <input type="file" class="form-control" name="img" onchange="displayImg(this,$(this))">
        </div> 

       <!-- // <input type="date" name="expire_date" class="form-control-sm form-control"  value="<?php echo date('Y-m-d') ?>"  placeholder="Expire Date" required> -->


 <div id="products">    
   
  </div>
</div>
</div>


<div class="modal-footer">
    <button type="submit" class="btn btnn btn-primary update_warehouse_btn" id='update_warehouse_btn'><i class="fas fa-thumbs-up">&nbsp&nbsp</i>Update</button>
    <button type="button" class="btn btnn btn-danger" data-dismiss="modal"><i class="fas fa-ban">&nbsp&nbsp</i>Cancel</button>
</div> 


</div>
</div>
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


   $("#price2, #quantity2").keyup(function(){
    //alert('oeiwoi')
 var multtotal1 = 0;
 var x = Number($("#price2").val());
 var y = Number($("#quantity2").val());
 var multtotal1= x * y;

 $("#multtotal2").val(multtotal1);

});









   $('#manage-payment').submit(function(e){
  e.preventDefault();

//alert('kk');

  $('#msg').html('')
    
    if($.trim($('#companynameid').val()).length = 0){
      Swal.fire("Warning","Please Select Supplier!","warning");
      return false;
    }

   const fd = new FormData(this);
   $(".update_warehouse_btn").text('Updating....');

     $.ajax({
       url: '{{ route('update.warehouse') }}',
       method: 'post',
       data: fd,
       cache: false,
       processData:false,
     contentType:false,
       success:function(resp){
         //alert(resp.status);
         if(resp.status == 200){
           Swal.fire(
             'Update',
           'Warehouse Updated Successfully!',
             'success'
           )
           setTimeout(function(){
      location.reload()
        },1000)

        $('.update_warehouse_btn').text('Update');
        $('#manage-payment')[0].reset();
        $('#payment_order').modal('hide');

         }else{
            Swal.fire(
             'Update',
           'Product Name Already Exist!',
             'warning'
           )
           setTimeout(function(){     
        },1000)
         
          $('.update_warehouse_btn').text('Update');
         }
     
        
       
       }
     });
  
});
   


</script>