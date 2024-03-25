@extends('master')
@section("content")
@section("title") {{ 'Warehouse' }} @endsection
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
					<b>Warehouse Iterms </b>	
        <!-- Button trigger modal -->
            <span class="float:right"><a class="btn btn-primary btn-block btn-sm col-sm-2 float-right" href="javascript:void(0)" data-toggle="modal" 
				data-target="#payment_form">
					<i class="fa fa-plus"></i> New product </a></span>			

					</div>
					<div class="card-body" style="font-size: 15px;">
					<!-- Table Panel -->
						<div class="" id="showwarehouses">
						<h1 class="text-center text-secondary my-5">Loading... </h1>
						</div>
          
									


            
            

					</div>
				</div>
			</div>
			
		</div>
	</div>	
</div>


@include("admin.warehouse_update")
@include("admin.warehouse_form")



 
{{-- Warehouse--}}

<script type="text/javascript">

//fetch all employees
$(document).ready(function(){    
    showAllwarehouse();

    function showAllwarehouse(){
        _tables("#showwarehouses",'{{ route('fetchall.warehouse') }}','List of Warehouse Information'); 
    }
  });

//edit employee ajax request
$(document).on('click','.update_ware',function(e){
  e.preventDefault();
  
  
  let id = $(this).attr('data-id');

   
  $.ajax({
		url: '{{ route('edit.warehouse') }}',
		method: 'get',
		data:{id: id,
		_token: '{{ csrf_token() }}'
		},
 		success:function(resp){			  

 			
 	$('#sid').val(resp.sid);
	$('#companynameid').val(resp.supplier_id);
	$('#name').val(resp.name);
	$('#quantity').val(resp.quantity);
	$('#price').val(resp.price);
	$('#multtotal').val(resp.multtotal);
	$('#unit').val(resp.unit);
	$('#description').val(resp.description);
	$('#expire_date').val(resp.expire_date);

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