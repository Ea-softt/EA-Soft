@extends('master')
@section("content")
@section("title") {{ 'Customer' }} @endsection
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
					<b>List of Users </b>	
        <!-- Button trigger modal -->
            <span class="float:right"><a class="btn btn-primary btn-block btn-sm col-sm-2 float-right" href="{{ route('regist') }}">



            	<!--  <a class="registration" href=""> </a> <br> -->





					<i class="fa fa-plus"></i> {{ __('Create New Account') }} </a></span>			

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


@include("admin.newuser_update")


 
{{-- employeeform --}}

<script type="text/javascript">


//fetch all customer
$(document).ready(function(){    
    showAllcustomer();

    function showAllcustomer(){
        _tables("#showcustomer",'{{ route('fetchnewuser') }}','List of Customers Information'); 
    }
  });

//edit employee ajax request
$(document).on('click','.edit_newuser',function(e){
  e.preventDefault();
  
  //alert('ok')
  let id = $(this).attr('data-id');
  //alert(id);
   
  $.ajax({
		url: '{{ route('edit_newuser') }}',
		method: 'get',
		data:{id: id,
		_token: '{{ csrf_token() }}'
		},
 		success:function(resp){			

	$('#id').val(resp.id);
	$('#name').val(resp.name);
	$('#email').val(resp.email);
	$('#password').val(resp.password);
	$('#role').val(resp.role);
	$('#status').val(resp.status);
		}
  });
});
















//delete employee information
$(document).on('click', '.delete_newuser', function(e){
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
					url: '{{ route('deletes_newusers') }}',
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