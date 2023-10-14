  <!-- Modal -->
  <div class="modal fade large" id="updateemployee" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <form action="" method="POST" class="update_employe_form"  id="update_employe_form">
      @csrf

      
   
   
    <div class="modal-dialog modal-lg large" role="document">
      <div class="modal-content">
        <div class="modal-header bg-success">
          <h5 class="modal-title text-white" id="updateemployeeLabel">Update Employee Forms</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="errMsgContainer mb-3">

      </div>  

      
      <div class="row">
        <div class="col-lg-4 border-right">
          
          <div class="form-group">
            <label class="">Emp Id:</label>
            <input class="form-control"   type="text" id="up_id" name="up_id" readonly>			
            </div>



       <div class="form-group">
       <label class="">Emp Name:</label>
       <input class="form-control"   type="text" id="upFullName" name="upFullName" placeholder="Full Name" value="<?php echo isset ($FullName)? $FullName :''?>">			
       </div>

    
        <div class="form-group">
        <label class="">Date of Birth:</label>		
        <input class="form-control"  type="Date" id="upDOB" name="upDOB" placeholder="" value="<?php echo isset ($DOB)? $DOB :''?>">		
        </div>


       <div class="form-group">
     <label class="">Age:</label>		
     <input class="form-control"  type="text" id="upAge" name="upAge" placeholder="" value="<?php echo isset ($Age)? $Age :''?>">		
     </div>
        

     

     <div class="form-group ">
      <label class="">Gender:</label>
     <select class="form-control" style="font-size:15px;"  id="upGender" name="upGender">				
        <option selected="" disabled="" value="Select">--Select--</option>
        <option selected="" value="<?php echo isset($Gender)? $Gender :''?>"><?php echo isset($Gender)? $Gender :''?></option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        <option value="Other">Other</option>
     </select>
     </div>

     <div class="form-group">
      <label class="">Language Speak:</label>
     <input class="form-control" style="font-size:15px;" type="text" id="upLanguage" name="upLanguage" placeholder="Language Speak" value="<?php echo isset($Language)? $Language :''?>">
     </div>

     <div class="form-group">
      <label class="">Hometown:</label>
     <input class="form-control" style="font-size:15px;" type="text" id="upHometown" name="upHometown" placeholder="Hometown" value="<?php echo isset($Hometown)? $Hometown :''?>" >			
     </div>

     <div class="form-group">
      <label class="">Nationality:</label>
     <input class="form-control" style="font-size:15px;" type="text" id="upNationality" name="upNationality" placeholder="Nationality" value="<?php echo isset($Nationality)? $Nationality :''?>">			
     </div>


        <div class="form-group">
      <label class="">Religion:</label>
     <input class="form-control"  type="text" id="upReligion" name="upReligion" placeholder="Religion"  value="<?php echo isset ($Religion)? $Religion :''?>">			
     </div>		
     </div>

      <!-- school -->
     <div class="col-lg-4 border-right">
     <div class="form-group">
     <label class="">Name of Last School:</label>		
     <input class="form-control"  type="text" id="upLastschool" name="upLastschool" placeholder="Last School"  value="<?php echo isset($Lastschool)? $Lastschool :''?>">		
     </div> 

        <div class="form-group">
        <label class="">Qualification:</label>
        <select class="form-control"  type="text" id="upQualification" name="upQualification" placeholder="Hometown" >	
        <option selected="" disabled="" value="--Select--">--Select--</option>
        <option selected="" value="<?php echo isset($Qualification)? $Qualification :''?>"><?php echo isset ($Qualification)? $Qualification :''?></option>
        <option  value="Some School Experienc">Some School Experienc</option>
        <option   value="Basic Cartificate">Basic Cartificate</option>
        <option  value="Vocational Cartificate">Vocational Cartificate</option>
        <option   value="Senior">Senior</option>
        <option  value="Diploma">Diploma</option>
        <option   value="Higher Diploma">Higher Diploma</option>
        <option  value="Degree">Degree</option>
        <option   value="Masters">Masters</option>
        <option  value="PHD">PHD</option>
        <option   value="Others">Others</option>
        </select>		
        </div>


        <div class="form-group">
        <label class="">Phone Number:</label>
        <input class="form-control"  type="text" id="upPhonenum" name="upPhonenum" placeholder="Phone Number" value="<?php echo isset ($Phonenum)? $Phonenum :''?>">			
        </div>


        <div class="form-group">
        <label class="">E-Mail:</label>
        <input class="form-control"  type="Mail" id="upMail" name="upMail" placeholder="E-Mail" value="<?php echo isset ($Mail)? $Mail :''?>" >			
        </div>

        <div class="form-group">
        <label class="">Address 1:</label>
        <textarea  class="form-control "  type="text" id="upAddress" name="upAddress" placeholder="Nationality" value="<?php echo isset ($Address)? $Address :''?>">	<?php echo isset($Address)? $Address :''?>	
        </textarea>
        </div>

        <div class="form-group">
        <label class="">Address 2:</label>
        <textarea  class="form-control "  type="text" id="upAddress2" name="upAddress2" placeholder="Address2" value="<?php echo isset ($Address2)? $Address2 :''?>">	<?php echo isset ($Address2)? $Address2 :''?>	
        </textarea>
        </div>
     </div>



      
        <!--picture-->
        <div class="col-lg-4">
        <div class="form-group">
        <div class="mt-2" id="avatar">
        
        </div>	
        </div>

       
      
        <div class="form-group">
          <label for="" class="control-label">Image of Employee</label>
          <input type="file" class="form-control"   name="avatar">
          <span class="text-danger error-text avatar_error"></span>  
        </div>
        <input type="hidden" class="form-control" id="emp_avatar" name="emp_avatar">
        



        <div class="form-group">
        <label class="">Dapartment:</label>		
        
            <select class="form-control form-select select2"   id="upDepartment" name="upDepartment">        
            <option class="text-center" selected="" disabled=""  value="Select">----Select----</option>
            <option class="text-center" selected=""  value="<?php echo isset ($Department)? $Department :''?>"><?php echo isset ($Department)? $Department :''?></option>
            <option  value="Admin">Admin</option>
        <option   value="Staff">Staff</option>
            </select>
        </div>

        <div class="form-group">
        <label class="">Starting Date:</label>		
        <input class="form-control"  type="Date" id="upStartingDate" name="upStartingDate" placeholder="" readonly>		
        </div>
        <div class="form-group">
        <label class="">Status:</label>
        <select class="form-control"  type="text" id="upStatus" name="upStatus" placeholder="Status" >	
        <option selected="" disabled="" value="--Select--">--Select--</option>
        <option selected="" value="<?php echo isset ($Status)? $Status :''?>"><?php echo isset($Status)? $Status :''?></option>
        <option  value="Active">Active</option>
        <option   value="Not active">Not active</option>
        </select>		
        </div>



        <div class="form-group">
        <label class="">Name of Employer:</label>
        <input class="form-control"  type="text" id="upEmployer" name="upEmployer" placeholder="Employer" >			
        </div>


        </div>
        </div>


          </div>
          <div class="modal-footer btnn">
        <button type="submit" class="btn btnn btn-primary update_employees_btn" id='upsubmit'><i class="fas fa-thumbs-up">&nbsp&nbsp</i>Update</button>
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

$('.update_employe_form').submit(function(e){
  e.preventDefault();
  
  const fd = new FormData(this);
  $(".update_employees_btn").text('Updating....');
    $.ajax({
      url: '{{ route('update.employee') }}',
      method: 'post',
      data: fd,
      cache: false,
      processData:false,
      contentType:false,
      success:function(resp){
        alert(resp)
        if(resp.status == 200){
          Swal.fire(
            'Update',
            'Employee Updated Successfully!',
            'success'
          )
          setTimeout(function(){
       location.reload()
       },1000)
        }
      //console.log(resp);
       $('.update_employees_btn').text('Update');
       $('.update_employe_form')[0].reset();
       $('#updateemployee').modal('hide');
       
      }
    });
  
});





  // $(document).ready(function(){
  // $(document).on('click','.update_employees',function(e){
  //       e.preventDefault()
  //       start_load()
  //       let upid = $('#upid').val();
  //     let upFullName = $('#upFullName').val();
  //     let upDOB = $('#upDOB').val();
  //     let upAge = $('#upAge').val();
  //     let upGender = $('#upGender').val();
  //     let upLanguage = $('#upLanguage').val();
  //     let upHometown = $('#upHometown').val();
  //     let upNationality = $('#upNationality').val();
  //     let upReligion = $('#upReligion').val();
  //     let upLastschool = $('#upLastschool').val();
  //     let upQualification = $('#upQualification').val();
  //     let upPhonenum = $('#upPhonenum').val();
  //     let upMail = $('#upMail').val();
  //     let upAddress = $('#upAddress').val();
  //     let upAddress2 = $('#upAddress2').val();
  //     let upDepartment = $('#upDepartment').val();
  //     let upStartingDate = $('#upStartingDate').val();
  //     let upStatus = $('#upStatus').val();
  //     let upEmployer = $('#upEmployer').val();
      
      

      
       
  //       $.ajax({
  //           url:"{{ route('update.employee') }}", 
  //           method: 'post',                       
  //           data: {upid:upid,upFullName:upFullName,upDOB:upDOB,upAge:upAge,upGender:upGender,upLanguage:upLanguage,upHometown:upHometown,upNationality:upNationality,upReligion:upReligion,upLastschool:upLastschool,
  //             upQualification:upQualification,upPhonenum:upPhonenum,upMail:upMail,upAddress:upAddress,upAddress2:upAddress2,upDepartment:upDepartment,upStartingDate:upStartingDate,upStatus:upStatus,
  //             upEmployer:upEmployer},     
  //           success:function(resp){
  //             alert(resp.status);
  //             if(resp.status=='success'){
  //               $('#staticBackdrop').modal('hide');
  //               $('#update_employe')[0].reset();
  //               $('.table').load(location.href+' .table')
  //             }
  //           },error:function(err){
  //             let error = err.responseJSON;
  //             $.each(error.errors,function(index, value){
  //               $('.errMsgContainer').append('<span class="text-danger">'+value+'</span>'+'<br>');
  //             });
  //           }
  //       })
  //   })
  // });



$('.select2').select2({
    placeholder:'Please select here',
    width:'100%'
  })
</script>