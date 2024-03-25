<div class="modal fade large" id="uni_modals" tabindex="-1" data-backdrop="static" aria-labelledby="uni_modalslabel"  aria-hidden="true">
  <form action="#" method="post"  id="new_employee_form" enctype="multipart/form-data">
        @csrf

      <div class="modal-dialog modal-lg large" role="document">      
      <div class="modal-content">
        <div class="modal-header bg-success">           
        <h5 class="modal-title text-white " id="uni_modalslabel">Employee Forms</h5>
        <button type="button" class="btn-danger btnn"  data-dismiss="modal" aria-label="Close"><span class="fa fa-times"></span></button> <i class=""> 
      </div>
      <div class="modal-body">
      <div class="errMsgContainer mb-3">
 
      </div>

    
      <div class="row">
      <div class="col-lg-4 border-right"> 		
      
      
      {{-- <div class="form-group" >
      <label class="">ID:</label>
     <input class="form-control" type="text" id="EmpID" name="EmpID"   readonly>	
     </div>	    --}}
     


     <div class="form-group">
      <label class="">Emp Name:</label>
     <input class="form-control"   type="text" id="FullName" name="FullName" placeholder="Full Name">
     <span class="text-danger error-text FullName_error"></span>	

     </div>

    
     <div class="form-group">
     <label class="">Date of Birth:</label>		
     <input class="form-control"  type="Date" id="DOB" name="DOB" placeholder="">	
     <span class="text-danger error-text DOB_error"></span>	
     </div>


       <div class="form-group">
     <label class="">Age:</label>		
     <input class="form-control"  type="text" id="Age" name="Age" placeholder="" value="<?php echo isset ($Age)? $Age :''?>">
     <span class="text-danger error-text Age_error"></span>		
     </div>
    
     

     <div class="form-group ">
      <label class="">Gender:</label>
     <select class="form-control" style="font-size:15px;"  id="Gender" name="Gender">				
        <option selected="" disabled="" value="Select">--Select--</option>
        <option selected="" value="<?php echo isset($Gender)? $Gender :''?>"><?php echo isset($Gender)? $Gender :''?></option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        <option value="Other">Other</option>
     </select>
     <span class="text-danger error-text Gender_error"></span>
     </div>

     <div class="form-group">
      <label class="">Language Speak:</label>
     <input class="form-control" style="font-size:15px;" type="text" id="Language" name="Language" placeholder="Language Speak" value="<?php echo isset($Language)? $Language :''?>">
     <span class="text-danger error-text Language_error"></span> 
    </div>

     <div class="form-group">
      <label class="">Hometown:</label>
     <input class="form-control" style="font-size:15px;" type="text" id="Hometown" name="Hometown" placeholder="Hometown" value="<?php echo isset($Hometown)? $Hometown :''?>" >			
     <span class="text-danger error-text Hometown_error"></span> 
    </div>

     <div class="form-group">
      <label class="">Nationality:</label>
     <input class="form-control" style="font-size:15px;" type="text" id="Nationality" name="Nationality" placeholder="Nationality" value="<?php echo isset($Nationality)? $Nationality :''?>">			
     <span class="text-danger error-text Nationality_error"></span> 
    </div>


        <div class="form-group">
      <label class="">Religion:</label>
     <input class="form-control"  type="text" id="Religion" name="Religion" placeholder="Religion"  value="<?php echo isset ($Religion)? $Religion :''?>">			
     <span class="text-danger error-text Religion_error"></span>
    </div>		
     </div>

      
      
     <!-- school -->
     <div class="col-lg-4 border-right">
     <div class="form-group">
     <label class="">Name of Last School:</label>		
     <input class="form-control"  type="text" id="Lastschool" name="Lastschool" placeholder="Last School"  value="<?php echo isset($Lastschool)? $Lastschool :''?>">		
     <span class="text-danger error-text Lastschool_error"></span>
    </div> 

        <div class="form-group">
        <label class="">Qualification:</label>
        <select class="form-control"  type="text" id="Qualification" name="Qualification" placeholder="Hometown" >	
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
        <span class="text-danger error-text Qualification_error"></span>	
        </div>


        <div class="form-group">
        <label class="">Phone Number:</label>
        <input class="form-control"  type="text" id="Phonenum" name="Phonenum" placeholder="Phone Number" value="<?php echo isset ($Phonenum)? $Phonenum :''?>">			
        <span class="text-danger error-text Phonenum_error"></span>
      </div>


        <div class="form-group">
        <label class="">E-Mail:</label>
        <input class="form-control"  type="Mail" id="Mail" name="Mail" placeholder="E-Mail" value="<?php echo isset ($Mail)? $Mail :''?>" >			
        <span class="text-danger error-text Mail_error"></span>
      </div>

        <div class="form-group">
        <label class="">Address 1:</label>
        <textarea  class="form-control "  type="text" id="Address" name="Address" placeholder="Nationality" value="<?php echo isset ($Address)? $Address :''?>">	<?php echo isset($Address)? $Address :''?>	
        </textarea>
        <span class="text-danger error-text Address_error"></span>
      </div>

        <div class="form-group">
        <label class="">Address 2:</label>
        <textarea  class="form-control "  type="text" id="Address2" name="Address2" placeholder="Address2" value="<?php echo isset ($Address2)? $Address2 :''?>">	<?php echo isset ($Address2)? $Address2 :''?>	
        </textarea>
        <span class="text-danger error-text Address2_error"></span>  
      </div>

        </div>





        

        <!--picture-->
        <div class="col-lg-4">
        <div class="form-group">
        <img src="<?php echo isset($meta['picture']) ? '../img/'.$meta['picture'] :'' ?>" alt="" id="cimg">		
        </div>

        <!-- 
      <div class="col-sm-3 d-flex align-items-center">
        <img style="margin:10px;" src="<?php echo isset($meta['imagef']) ? 'img/'.$meta['imagef'] :'' ?>" alt="mdo" width="60" height="60" class="rounded-circle">       
        </div> -->







      
        <div class="form-group">
        <label for="" class="control-label">Image of Employee</label>
        <input type="file" class="form-control" name="avatar" onchange="displayImg(this,$(this))">
        <span class="text-danger error-text avatar_error"></span>  
      </div>
        
        



        <div class="form-group">
        <label class="">Dapartment:</label>		
        
            <select class="form-control form-select select2"   id="Department" name="Department">        
            <option class="text-center" selected="" disabled=""  value="Select">----Select----</option>
            <option class="text-center" selected=""  value="<?php echo isset ($Department)? $Department :''?>"><?php echo isset ($Department)? $Department :''?></option>
            <option  value="Admin">Admin</option>
        <option   value="Staff">Staff</option>
            </select>
            <span class="text-danger error-text Department_error"></span>
        </div>

        <div class="form-group">
        <label class="">Starting Date:</label>		
        <input class="form-control"  type="Date" id="StartingDate" name="StartingDate" placeholder="" value="<?php echo isset ($StartingDate)? $StartingDate :''?>">		
        <span class="text-danger error-text StartingDate_error"></span>
      </div>
       
      <div class="form-group">
        <label class="">Status:</label>
        <select class="form-control"  type="text" id="Status" name="Status" placeholder="Status" >	
        <option selected="" disabled="" value="--Select--">--Select--</option>
        <option selected="" value="<?php echo isset ($Status)? $Status :''?>"><?php echo isset($Status)? $Status :''?></option>
        <option  value="Active">Active</option>
        <option   value="Not active">Not active</option>
        </select>		
        <span class="text-danger error-text Status_error"></span>
        </div>



        <div class="form-group">
        <label class="">Name of Employer:</label>
        <input class="form-control"  type="text" id="Employer" name="Employer" placeholder="Employer"  value="<?php isset ($Employer)? $Employer :''?>">			
        <span class="text-danger error-text Employer_error"></span>
      </div>


        </div>
        </div>


          </div>
          <div class="modal-footer btnn">
        <button type="submit" class="btn btnn btn-primary add_employees_btn" id='add_employees_btn'><i class="fas fa-thumbs-up">&nbsp&nbsp</i>Save</button>
        <button type="button" class="btn btnn btn-danger" data-dismiss="modal"><i class="fas fa-ban">&nbsp&nbsp</i>Cancel</button>
      </div>
      </div>
    </form>
</div>
 
{{--   
  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Understood</button>
        </div>
      </div>
    </div>
  </div> --}}


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

   
$("#new_employee_form").submit(function(e){ 
  e.preventDefault();
  

  const fd = new FormData(this);
  $("#add_employees_btn").text('Loading...');
    
  $.ajax({
   url: '{{ route('add.employee') }}',
   method: 'post',
   data: fd,
   cache: false,
   dataType:false,
   processData:false,
   contentType:false,
   beforeSend:function(){
    $(new_employee_form).find('span.error-text').text();},
   success:function(resp){   
     if(resp.status == 0){
     $.each(resp.error, function(prefix,val){
        $(new_employee_form).find('span.'+prefix+'_error').text(val[0]);
        $("#add_employees_btn").text('Save');
      });    
    }else{     
      Swal.fire(
        'Added',
        'Employee Added Successfully!',
        'success'
      )
     $("#add_employees_btn").text('Save');    
     $("#new_employee_form")[0].reset();
     $('#uni_modals').modal('hide');
     showAllemployee();
    // $('.table').load(location.href+' .table')
    }
   }
 })
  
});


//error:function(err){
  //             let error = err.responseJSON;
  //             $.each(error.errors,function(index, value){
  //               $('.errMsgContainer').append('<span class="text-danger">'+value+'</span>'+'<br>');
  //             });
	
// $('#new_employe').submit(function(e){
  // $(document).ready(function(){
  // $(document).on('click','.add_employees',function(e){
  //       e.preventDefault()
  //       start_load()
  //      alert('on the pipe lines');
  //     let FullName = $('#FullName').val();
  //     let DOB  = $('#DOB').val();
  //     let Age = $('#Age').val();
  //     let Gender = $('#Gender').val();
  //     let Language = $('#Language').val();
  //     let Hometown = $('#Hometown').val();
  //     let Nationality = $('#Nationality').val();
  //     let Religion = $('#Religion').val();
  //     let Lastschool = $('#Lastschool').val();
  //     let Qualification = $('#Qualification').val();
  //     let Phonenum = $('#Phonenum').val();
  //     let Mail = $('#Mail').val();
  //     let Address = $('#Address').val();
  //     let Address2 = $('#Address2').val();
  //     let Department = $('#Department').val();
  //     let StartingDate = $('#StartingDate').val();
  //     let Status = $('#Status').val();
  //     let Employer = $('#Employer').val();
      

  //    // console.log(FullName+DOB);
       
  //       $.ajax({
  //           url:"{{ route('add.employee') }}", 
  //           method: 'post',                       
  //           data: {FullName:FullName,DOB:DOB,Age:Age,Gender:Gender,Language:Language,Hometown:Hometown,Nationality:Nationality,Religion:Religion,Lastschool:Lastschool,
  //             Qualification:Qualification,Phonenum:Phonenum,Mail:Mail,Address:Address,Address2:Address2,Department:Department,StartingDate:StartingDate,Status:Status,
  //           Employer:Employer},     
  //           success:function(resp){
  //             if(resp.status=='success'){
  //               $('#uni_modals').modal('hide');
  //               $('#new_employe')[0].reset();
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