  <!-- Modal -->
  <div class="modal fade large" id="updatesupplier" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <form action="" method="POST" class="update_supplier_form"  id="update_supplier_form">
      @csrf

      
   
   
    <div class="modal-dialog modal-lg small" role="document">
      <div class="modal-content">
        <div class="modal-header bg-success">
          <h5 class="modal-title text-white" id="updatesupplierLabel">Update Supplier</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="errMsgContainer mb-3">

      </div>  

      
      <div class="row">
        <div class="col-lg-12">
          
            <div class="form-group">
                <label class="">ID:</label>
                <input class="form-control"  type="text" id="up_id" name="up_id" placeholder="First Name" readonly>			
                <span class="text-danger error-text upid_error"></span>
              </div>

            <div class="form-group">
                <label class="">Company Name:</label>
                <input class="form-control"  type="text" id="upcompanyname" name="upcompanyname" placeholder="First Name"  value="<?php isset ($Employer)? $Employer :''?>">			
                <span class="text-danger error-text upcompanyname_error"></span>
              </div>
      
              <div class="form-group">
                <label class="">Full Name:</label>
                <input class="form-control"  type="text" id="upfullname" name="upfullname" placeholder="Last Name"  value="<?php isset ($Employer)? $Employer :''?>">			
                <span class="text-danger error-text upfullname_error"></span>
              </div>
      
                        
              <div class="form-group">
                <label class="">Address:</label>
                <input class="form-control"  type="text" id="upaddress" name="upaddress" placeholder="address"  value="<?php isset ($Employer)? $Employer :''?>">			
                <span class="text-danger error-text upaddress_error"></span>
              </div>
      
                        
              <div class="form-group">
                <label class="" valign="baseline">Phone Number:</label>
                <input class="form-control"  type="text" id="upnumber" name="upnumber" placeholder="number"  value="<?php isset ($Employer)? $Employer :''?>">			
                <span class="text-danger error-text upnumber_error"></span>
              </div>


        </div>
        </div>


          </div>
          <div class="modal-footer btnn">
        <button type="submit" class="btn btnn btn-primary update_supplier_btn" id='upsubmit'><i class="fas fa-thumbs-up">&nbsp&nbsp</i>Update</button>
        <button type="button" class="btn btnn btn-danger" data-dismiss="modal"><i class="fas fa-ban">&nbsp&nbsp</i>Cancel</button>
      </div>
      </div>
    </form>
      </div>
        </div>
       
      </div>
    </div>
  </div> 


  <style>
    img#cimg{
        max-height: 30vh;
        max-width: 60vw;
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

function displayImg(input,_this) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#cimg').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$('.update_supplier_form').submit(function(e){
  e.preventDefault();

  const fd = new FormData(this);
  $(".update_supplier_btn").text('Updating....');
    $.ajax({
      url: '{{ route('update.supplier') }}',
      method: 'post',
      data: fd,
      cache: false,
      processData:false,
      contentType:false,
      success:function(resp){
        //alert(resp)
        if(resp.status == 200){
          Swal.fire(
            'Update',
            'Supplier Updated Successfully!',
            'success'
          )
          setTimeout(function(){
       location.reload()
       },1000)
        }
     
       $('.update_supplier_btn').text('Update');
       $('.update_supplier_form')[0].reset();
       $('#updatesupplier').modal('hide');
       
      }
    });
  
});


$('.select2').select2({
    placeholder:'Please select here',
    width:'100%'
  })
</script>