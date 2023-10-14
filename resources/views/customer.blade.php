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
					<b>List of Customer </b>	
        <!-- Button trigger modal -->
            <span class="float:right"><a class="btn btn-primary btn-block btn-sm col-sm-2 float-right" href="javascript:void(0)" data-toggle="modal" 
				data-target="#new_customer">
					<i class="fa fa-plus"></i> New Customer </a></span>			

					</div>
					<div class="card-body" style="font-size: 15px;">
					<!-- Table Panel -->
						<div class="" id="showcustomer">
						<h1 class="text-center text-secondary my-5">Loading... </h1>
						</div>
          
									


            
            

					</div>
				</div>
			</div>
			
		</div>
	</div>	
</div>


@include("customer_update")
@include("customer_form")

 
{{-- employeeform --}}

<script type="text/javascript">

//fetch all employees
$(document).ready(function(){    
    showAllcustomer();

    function showAllcustomer(){
        _tables("#showcustomer",'{{ route('fetchall.customer') }}','List of Customers Information'); 
    }
  });

//edit employee ajax request
$(document).on('click','.update_customer',function(e){
  e.preventDefault();
  
  alert('ok')
  let id = $(this).attr('data-id');
  //alert(id);
   
  $.ajax({
		url: '{{ route('edit.customer') }}',
		method: 'get',
		data:{id: id,
		_token: '{{ csrf_token() }}'
		},
 		success:function(resp){			

	$('#up_id').val(resp.id);
	$('#upfname').val(resp.FirstName);
	$('#uplname').val(resp.LastName);
	$('#upaddress').val(resp.Address);
	$('#upnumber').val(resp.phonenumber);
		
		}
  });
});



//delete employee information
$(document).on('click', '.delete_customer', function(e){
	e.preventDefault();
	let id = $(this).attr('data-id');
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
					url: '{{ route('delete.customer') }}',
					method: 'post',
					data: {
					id: id,
					_token: '{{ csrf_token() }}'
					},
					success:function(resp){
						Swal.fire(
							'Deleted!',
							'Customer deleted Successfully!.',
							'success'
						)
						setTimeout(function(){
       						location.reload()
       						},1000)
					}
				});
			}
		});
});



</script>
@endsection