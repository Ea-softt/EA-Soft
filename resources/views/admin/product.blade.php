@extends('master')
@section("content")
@section("title") {{ 'Product' }} @endsection
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
					<b>List of Store </b>
        <!-- Button trigger modal -->
            <span class="float:right" ><a class="btn btn-primary btn-block btn-sm col-sm-2 float-right" href="javascript:void(0)" data-toggle="modal"
				data-target="#" id="product_form">
					<i class="fa fa-plus"></i> New Store </a></span>

					</div>
					<div class="card-body" style="font-size: 15px;">
					<!-- Table Panel -->
						<div class="" id="showstock">
						<h1 class="text-center text-secondary my-5">Loading... </h1>
						</div>







					</div>
				</div>
			</div>

		</div>
	</div>
</div>


@include("admin.customer_update")



{{-- employeeform --}}

<script type="text/javascript">
$(document).ready(function(){
    showAllstock();

    function showAllstock(){
        _tables("#showstock",'{{ route('stock.fetch') }}','List of stock Information');
    }
  });


 $('#product_form').click(function(){
    window.location.href='{{ route('form.product') }}'



   });

  /* $(document).on('click', '.btn_delete', function(e){
	e.preventDefault();
	let id = $(this).attr('data-delete_btn');
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
					url: '{{ route('deletes.stock') }}',
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
*/









//}


//$('mytable').ddTableFilter();




function edit_data(productID, text, column_name)
{

 Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Save!'
        }).then((result) => {
            if (result.isConfirmed){

				  $.ajax({
				    url:'{{ route('edits.products') }}',
				    method:"POST",
				    data:{productID:productID, text:text, column_name:column_name},
				    dataType:"text",
				    success:function(data)
				    {
				    	//alert(data);
				      if(data == 1){
				                  alert_toast("Data successfully update.",'success')
				                        setTimeout(function(){
				                           //location.reload()
				                        },900)
				                }
				        }

				  });
			}
		});
}










//update the table from the table

 $(document).on('blur', '.product_no', function(){
var product_no1 = $(this).data("product_no");
var product_no = $(this).text();
if(product_no== ""){
//swal("Warning","Please Enter Barcode ! or Reload the Page","warning");
     return false;
        }
edit_data(product_no1, product_no, "product_no");
});



$(document).on('blur', '.product_name', function(){
var product_no = $(this).data("product_name");
var product_name = $(this).text();
if(product_name== ""){
//swal("Warning","Please Enter Product Name ! or Reload the Page","warning");
     return false;
        }
edit_data(product_no,product_name, "product_name");
});





//cost_price

$(document).on('blur', '.cprice', function(){
var product_no = $(this).data("cprice");
var cprice = $(this).text();
if(cprice== ""){
//Swal.fire("Warning","Please Enter Sell Price ! or Reload the Page","warning");
     return false;
        }
edit_data(product_no, cprice, "cprice");
});







$(document).on('blur', '.sell_price', function(){
var product_no = $(this).data("sell_price");
var sell_price = $(this).text();
if(sell_price== ""){
//Swal.fire("Warning","Please Enter Sell Price ! or Reload the Page","warning");
     return false;
        }
edit_data(product_no, sell_price, "sell_price");
});


$(document).on('blur', '.quantity', function(){
var product_no = $(this).data("quantity");
var quantity = $(this).text();
if(quantity== ""){
//Swal.fire("Warning","Please Enter quantity ! or Reload the Page","warning");
     return false;
        }
edit_data(product_no, quantity, "quantity");
});


$(document).on('blur', '.unit', function(){
var product_no = $(this).data("unit");
var unit = $(this).text();
if(unit== ""){
//Swal.fire("Warning","Please Enter Unit ! or Reload the Page","warning");
     return false;
        }
edit_data(product_no, unit, "unit");
});


$(document).on('blur', '.min_stocks', function(){
var product_no = $(this).data("min_stocks");
var min_stocks = $(this).text();
if(min_stocks== ""){
//Swal.fire("Warning","Please Enter Min Stocks ! or Reload the Page","warning");
     return false;
        }
edit_data(product_no, min_stocks, "min_stocks");
});


$(document).on('blur', '.remarks', function(){
var product_no = $(this).data("remarks");
var remarks = $(this).text();
if(remarks== ""){
//Swal.fire("Warning","Please Enter Remarks ! or Reload the Page","warning");
     return false;
        }
edit_data(product_no, remarks, "remarks");

});


// the from the product in the stock
$(document).on('click', '.btn_delete', function(e){
	e.preventDefault();
	let id = $(this).attr('data-delete');
	
	_deletes(id, '{{ route('deletes.stock'), 'Product' }}');
});

//delete product from the stock
/*$(document).on('click', '.btn_delete', function(e){
    e.preventDefault();
    let id = $(this).attr('data-delete');
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
                    url: '{{ route('deletes.stock') }}',
                    method: 'post',
                    data: {
                    id: id,
                    _token: '{{ csrf_token() }}'
                    },
                    success:function(resp){
                    	//alert(resp.status);
                    	if (resp.status == 'success' ) {
                        Swal.fire(
                            'Deleted!',
                            'Product Deleted Successfully!.',
                            'success'
                        )
                        setTimeout(function(){
                            location.reload()
                            },1000)
                    }
                    }
                });
            }
        });
});*/


</script>
@endsection
