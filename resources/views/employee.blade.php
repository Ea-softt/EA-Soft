@extends('master')
@section("content")

<main class="w-100">
    
	<div class="col-lg-12">
		<div class="row">
			<div class="col-md-12">
				
			</div>
		</div>
		<div class="row">		
			<div class="col-md-12">
				<div class="card">					
					<div class="card-header bg-success text-white">
					<b>List of Employee </b>	
        <!-- Button trigger modal -->
            <span class="float:right"><a class="btn btn-primary btn-block btn-sm col-sm-2 float-right" href="javascript:void(0)" data-toggle="modal" 
				data-target="#uni_modals">
					<i class="fa fa-plus"></i> New Entry </a></span>			

					</div>
					<div class="card-body" style="font-size: 15px;">
					<!-- Table Panel -->
						<div class="" id="showemployee">
							<h1 class="text-center text-secondary my-5">Loading... </h1>
						</div>
          
									


            
            

					</div>
				</div>
			</div>
			
		</div>
	</div>	
</div>


@include("update_employee")
@include("employeeform")

 
{{-- employeeform --}}

<script type="text/javascript">
//fetch all employees
$(document).ready(function(){    
    showAllemployee();

    function showAllemployee(){
        _tables("#showemployee",'{{ route('fetchall.employee') }}','List of Employees Information'); 
    }
  });

//edit employee ajax request
$(document).on('click','.update_employee',function(e){
  e.preventDefault();
  
  let id = $(this).attr('data-id');
  //alert(id);
   
  $.ajax({
		url: '{{ route('edit.employee') }}',
		method: 'get',
		data:{id: id,
		_token: '{{ csrf_token() }}'
		},
 		success:function(resp){			

	$('#up_id').val(resp.id);
	$('#upFullName').val(resp.FullName);
	$('#upDOB').val(resp.DOB);
	$('#upAge').val(resp.Age);
	$('#upGender').val(resp.Gender);
	$('#upLanguage').val(resp.Language);
	$('#upHometown').val(resp.Hometown);
	$('#upNationality').val(resp.Nationality);
	 $('#upReligion').val(resp.Religion);
	 $('#upLastschool').val(resp.Lastschool);
	 $('#upQualification').val(resp.Qualification);
	 $('#upPhonenum').val(resp.Phonenum);
	 $('#upMail').val(resp.Mail);
	 $('#upAddress').val(resp.Address);
	 $('#upAddress2').val(resp.Address2);
	 $('#upDepartment').val(resp.Department);
	 $('#upStartingDate').val(resp.StartingDate);
	 $('#upEmployer').val(resp.Employer);
	 $('#upStatus').val(resp.Status);
  	 $('#avatar').html(`<img src="/storage/files/${resp.avatar}" width="100"
	 	class="img-fluid img-thumbnail">`);
	 $('#emp_avatar').val(resp.avatar);

		
		}
  });
});



//delete employee information
$(document).on('click', '.delete_employee', function(e){
	e.preventDefault();
	let id = $(this).attr('id');
	Swal.fire({
		title: 'Are you sure?',
		text: "You won't be able to revert this!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
			if (result.isConfirmed){
				$.ajax({
					url: '{{ route('delete.employee') }}',
					method: 'post',
					data: {
					id: id,
					_token: '{{ csrf_token() }}'
					},
					success:function(resp){
						Swal.fire(
							'Deleted!',
							'Employee deleted Successfully!.',
							'success'
						)
						showAllemployee();
					}
				});
			}
		});
});







// fetchAllEmployee();


//  function fetchAllEmployee(){
// 	$.ajax({
// 		url: '{{ route('fetchall.employee') }}',
// 		method: 'get',
// 		success:function(resp){
// 			$("#showemployee").html(resp);
// 		}
		        
// 	});
//  }



// $(document).ready(function(){ 
// $('table').dataTable();

// });


// $(document).on('click','.update_newemployee',function(){
	
// 	let id =$(this).attr('data-id');
// 	let FullName =$(this).attr('data-FullName');
// 	let DOB =$(this).attr('data-DOB');
//     let Age = $(this).attr('data-Age');
//     let Gender = $(this).attr('data-Gender');

// 	 let Language = $(this).attr('data-Language');
// 	 let Hometown = $(this).attr('data-Hometown');
// 	 let Nationality = $(this).attr('data-Nationality');
// 	 let Religion = $(this).attr('data-Religion');
// 	 let Lastschool = $(this).attr('data-Lastschool');
// 	 let Qualification = $(this).attr('data-Qualification');
// 	 let Phonenum = $(this).attr('data-Phonenum');
// 	 let Mail = $(this).attr('data-Mail');
// 	 let Address = $(this).attr('data-Address');
// 	 let Address2 = $(this).attr('data-Address2');
// 	 let Department = $(this).attr('data-Department');
// 	 let StartingDate = $(this).attr('data-StartingDate');
// 	 let Status = $(this).attr('data-Status');
// 	 let Employer = $(this).attr('data-Employer');
// 	console.log(FullName);
	
	


// 	$('#upid').val(id);
// 	$('#upFullName').val(FullName);
// 	$('#upDOB').val(DOB);
// 	$('#upAge').val(Age);
// 	$('#upGender').val(Gender);
// 	$('#upLanguage').val(Language);
// 	$('#upHometown').val(Hometown);
// 	$('#upNationality').val(Nationality);
// 	$('#upReligion').val(Religion);
// 	$('#upLastschool').val(Lastschool);
// 	$('#upQualification').val(Qualification);
// 	$('#upPhonenum').val(Phonenum);
// 	$('#upMail').val(Mail);
// 	$('#upAddress').val(Address);
// 	$('#upAddress2').val(Address2);
// 	$('#upDepartment').val(Department);
// 	$('#upStartingDate').val(StartingDate);
// 	$('#upStatus').val(Status);
// 	$('#upEmployer').val(Employer);
// });


// // delete employee information
// $(document).ready(function(){
//   $(document).on('click','.delete_newemployee',function(e){
//         e.preventDefault()
//         start_load()
//         let employeeid =$(this).attr('data-id');
      
//       if(confirm('Are you sure to delete selected Employees')){
//         alert(employeeid);
// 		$.ajax({
//             url:"{{ route('delete.employee') }}", 
//             method: 'post',                       
//             data: {employeeid:employeeid},     
//             success:function(resp){
//               alert(resp.status);
//               if(resp.status=='success'){
                
//                 $('.table').load(location.href+' .table')
//               }
//             }
//         });


// 	  }

//     })
//   });

</script>
@endsection