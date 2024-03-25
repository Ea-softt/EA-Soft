<div class="modal fade small" id="payment_form" tabindex="-1" data-backdrop="static" aria-labelledby="new_warehouselabel"  aria-hidden="true">
    <form action="#" method="post"  id="manage-payments" enctype="multipart/form-data">
          @csrf
  
        <div class="modal-dialog modal-lg small" role="document">      
        <div class="modal-content">
          <div class="modal-header bg-success">           
          <h5 class="modal-title text-white " id="new_warehouselabel">Product Entry</h5>
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
          <label class="">Product Name:</label>
          <input class="form-control"  type="text" id="name" name="name" placeholder="Product Name"  value="">			
          <span class="text-danger error-text fullName_error"></span>
        </div>

                     
        <div class="form-group">
          <label class="" valign="baseline">Quantity:</label>
          <input class="form-control"  type="text" id="quantity" name="quantity" placeholder="Quantity"  value="">			
          <span class="text-danger error-text number_error"></span>
        </div>
             
        


        <div class="form-group">
          <label class="">price:</label>
          <input class="form-control"  type="text" id="price" name="price" placeholder="price"  value="">
         <span class="text-danger  error-text address_error"></span>
        </div>

      

                  
        <div class="form-group">
          <label class="" valign="baseline">Total Cost:</label>
          <input class="form-control"  type="text" id="multtotal" name="multtotal" placeholder="Total Cost"  readonly value="">			
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

       <!--  <input type="date" name="expire_date" class="form-control-sm form-control"  value="<?php echo date('Y-m-d') ?>"  placeholder="Expire Date" required> -->


 <div id="products">    
   
  </div>




</div>





</form>



          
</div>
<div class="modal-footer">
    <button type="submit" class="btn btnn btn-primary addwarehouse_btn" id='add_warehousebtn'><i class="fas fa-thumbs-up">&nbsp&nbsp</i>Save</button>
    <button type="button" class="btn btnn btn-danger" data-dismiss="modal"><i class="fas fa-ban">&nbsp&nbsp</i>Cancel</button>
</div>
</div>
</div>
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

   
 $("#price, #quantity").keyup(function(){
    
 var multtotal1 = 0;
 var x = Number($("#price").val());
 var y = Number($("#quantity").val());
 //alert(x);
 var multtotal1= x * y;

 $("#multtotal").val(multtotal1);

});







$("#manage-payments").submit(function(e){ 
  e.preventDefault();
  

  const fd = new FormData(this);
  $("#add_warehousebtn").text('Loading...');
    
  $.ajax({
   url: '{{ route('add.warehouse') }}',
   method: 'post',
   data: fd,
   cache: false,
   dataType:false,
   processData:false,
   contentType:false,
   beforeSend:function(){
    $("#manage-payments").find('span.error-text').text();},
   success:function(resp){
  // alert(resp.status);   
     if(resp.status == 0){
     $.each(resp.error, function(prefix,val){
        $(new_supplier_form).find('span.'+prefix+'_error').text(val[0]);
        $("#add_warehousebtn").text('Save');
      });    
    }else if (resp.status == 2){     
      Swal.fire(
        'Error',
        'Warehouse Product Already Exist!',
        'warning'
      )
     $("#add_warehousebtn").text('Save'); 
    }else{

         Swal.fire(
        'Added',
        'Product Added Successfully!',
        'warning'
      )
     $("#add_warehousebtn").text('Save');    
     $("#manage-payments")[0].reset();
     $('#new_warehouse').modal('hide');
     setTimeout(function(){
       location.reload()
       },1000) 

    }
   }
 })
  
});



$('.select2').select2({
        placeholder:"Please Select here",
        width:'100%'
    })










</script>