<div class="modal fade large" id="new_supplier" tabindex="-1" data-backdrop="static" aria-labelledby="new_customerlabel"  aria-hidden="true">;
    <form action="#" method="post"  id="new_supplier_form" enctype="multipart/form-data">
          @csrf
  
        <div class="modal-dialog modal-lg small" role="document">      
        <div class="modal-content">
          <div class="modal-header bg-success">           
          <h5 class="modal-title text-white " id="new_supplierlabel">Supplier Entry</h5>
          <button type="button" class="btn-danger btnn"  data-dismiss="modal" aria-label="Close"><span class="fa fa-times"></span></button> <i class=""> 
        </div>
        <div class="modal-body">
        <div class="errMsgCustomer mb-3">   
        </div>
         <div class="row ">       
                <div class="col-sm-12  ">

                  
        <div class="form-group">
          <label class="">Company Name:</label>
          <input class="form-control"  type="text" id="companyname" name="companyname" placeholder="Company Name"  value="<?php isset ($Employer)? $Employer :''?>">			
          <span class="text-danger error-text companyname_error"></span>
        </div>

        <div class="form-group">
          <label class="">Full Name:</label>
          <input class="form-control"  type="text" id="fullName" name="fullName" placeholder="Full Name"  value="<?php isset ($Employer)? $Employer :''?>">			
          <span class="text-danger error-text fullName_error"></span>
        </div>

                  
        <div class="form-group">
          <label class="">Address:</label>
          <input class="form-control"  type="text" id="address" name="address" placeholder="address"  value="<?php isset ($Employer)? $Employer :''?>">			
          <span class="text-danger error-text address_error"></span>
        </div>

                  
        <div class="form-group">
          <label class="" valign="baseline">Phone Number:</label>
          <input class="form-control"  type="text" id="phonenumber" name="phonenumber" placeholder="number"  value="<?php isset ($Employer)? $Employer :''?>">			
          <span class="text-danger error-text number_error"></span>
        </div>

</div>
</div>


</form>



          
</div>
<div class="modal-footer">
    <button type="submit" class="btn btnn btn-primary add_customer_btn" id='add_customer_btn'><i class="fas fa-thumbs-up">&nbsp&nbsp</i>Save</button>
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

   
$("#new_supplier_form").submit(function(e){ 
  e.preventDefault();
  

  const fd = new FormData(this);
  $("#add_supplier_btn").text('Loading...');
    
  $.ajax({
   url: '{{ route('add.supplier') }}',
   method: 'post',
   data: fd,
   cache: false,
   dataType:false,
   processData:false,
   contentType:false,
   beforeSend:function(){
    $(new_supplier_form).find('span.error-text').text();},
   success:function(resp){   
     if(resp.status == 0){
     $.each(resp.error, function(prefix,val){
        $(new_supplier_form).find('span.'+prefix+'_error').text(val[0]);
        $("#add_supplier_btn").text('Save');
      });    
    }else{     
      Swal.fire(
        'Added',
        'Supplier Added Successfully!',
        'success'
      )
     $("#add_supplier_btn").text('Save');    
     $("#new_supplier_form")[0].reset();
     $('#new_supplier').modal('hide');
     setTimeout(function(){
       location.reload()
       },1000)
    // $('.table').load(location.href+' .table')
    }
   }
 })
  
});














</script>