@extends('master')
@section("content")
@section("title") {{ 'Payment' }} @endsection
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
                    <b>List of Payment </b>
        <!-- Button trigger modal -->
            <span class="float:right" ><a class="btn btn-primary btn-block btn-sm col-sm-2 float-right" href="javascript:void(0)" data-toggle="modal"
                data-target="#payment_form" >
                    <i class="fa fa-plus"></i> New Billing </a></span>

                    </div>
                    <div class="card-body" style="font-size: 15px;">
                    <!-- Table Panel -->
                        <div class="" id="showpayment">
                        <h1 class="text-center text-secondary my-5">Loading... </h1>
                        </div>







                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@include("admin.totalpaymentupdate")
@include("admin.tatolpaymentform")


{{-- Suppliersforms --}}

<script type="text/javascript">
$(document).ready(function(){    
    showAllcustomer();

    function showAllcustomer(){
        _tables("#showpayment",'{{ route('fetchall.supplierallPayment') }}','List of Customers Information'); 
    }
  });


 $('#product_form').click(function(){
    window.location.href='{{ route('form.product') }}'



   });


    $(document).on('click','.update_paymentorder',function(e){
  e.preventDefault();
  
  let id = $(this).attr('data-id');
  //alert(id);
   
  $.ajax({
        url: '{{ route('edit.paymentOrder') }}',
        method: 'get',
        data:{id: id,
        _token: '{{ csrf_token() }}'
        },
        success:function(resp){         
    $('#suppliername').val(resp.suppliername);
    $('#batchno').val(resp.batchno);
    $('#balance').val(resp.amountpaid);
    $('#amountpaid').val(resp.amountpaid);
    $('#amountt').val(resp.amountpayable);
    $('#amountpayable').val(resp.amountpayable);
    $('#remarks').val(resp.remark);
        

        }
  });
});






   $(document).on('click', '.delete_payments', function(e){
    e.preventDefault();


$('.delete_payments').text('Deleting....');
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
                    url: '{{ route('delete.paymentOrder') }}',
                    method: 'post',
                    data: {
                    id: id,
                    _token: '{{ csrf_token() }}'
                    },
                    success:function(res){
                     /*  alert(res.status);*/
                    if(res.status == 'success'){
                        Swal.fire(
                            'Deleted!',
                            'Payment Order deleted Successfully!.',
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
});










//}


//$('mytable').ddTableFilter();




function edit_data(productID, text, column_name)
{

Swal.fire({
      title: "Are You Sure of the Changes if not, Cancel and Reload?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })

.then((willedite) => {
      if (willedite) {

  $.ajax({
    url:'{{ route('edit.product') }}',
    method:"POST",
    data:{productID:productID, text:text, column_name:column_name},
    dataType:"text",
    success:function(data)
    {

      if(data = "data update"){
                  alert_toast("Data successfully update.",'success')
                        setTimeout(function(){
                           location.reload()
                        },900)
                }
        }

  });


}
});
}












 $(document).on('blur', '.product_no', function(){
var product_no1 = $(this).data("product_no");
var product_no = $(this).text();
if(product_no== ""){
swal("Warning","Please Enter Barcode ! or Reload the Page","warning");
     return false;
        }
edit_data(product_no1, product_no, "product_no");
});



$(document).on('blur', '.product_name', function(){
var product_no = $(this).data("product_name");
var product_name = $(this).text();
if(product_name== ""){
swal("Warning","Please Enter Product Name ! or Reload the Page","warning");
     return false;
        }
edit_data(product_no,product_name, "product_name");
});


$(document).on('blur', '.sell_price', function(){
var product_no = $(this).data("sell_price");
var sell_price = $(this).text();
if(sell_price== ""){
swal("Warning","Please Enter Sell Price ! or Reload the Page","warning");
     return false;
        }
edit_data(product_no, sell_price, "sell_price");
});


$(document).on('blur', '.quantity', function(){
var product_no = $(this).data("quantity");
var quantity = $(this).text();
if(quantity== ""){
swal("Warning","Please Enter quantity ! or Reload the Page","warning");
     return false;
        }
edit_data(product_no, quantity, "quantity");
});


$(document).on('blur', '.unit', function(){
var product_no = $(this).data("unit");
var unit = $(this).text();
if(unit== ""){
swal("Warning","Please Enter Unit ! or Reload the Page","warning");
     return false;
        }
edit_data(product_no, unit, "unit");
});


$(document).on('blur', '.min_stocks', function(){
var product_no = $(this).data("min_stocks");
var min_stocks = $(this).text();
if(min_stocks== ""){
swal("Warning","Please Enter Min Stocks ! or Reload the Page","warning");
     return false;
        }
edit_data(product_no, min_stocks, "min_stocks");
});


$(document).on('blur', '.remarks', function(){
var product_no = $(this).data("remarks");
var remarks = $(this).text();
if(remarks== ""){
swal("Warning","Please Enter Remarks ! or Reload the Page","warning");
     return false;
        }
edit_data(product_no, remarks, "remarks");

});



//fetch all employees
//

//edit employee ajax request
// $(document).on('click','',function(e){
//   e.preventDefault();

//   alert('okay');
//   let id = $(this).attr('data-id');
//   //alert(id);

//   $.ajax({
//         url: '{{ route('edit.customer') }}',
//         method: 'get',
//         data:{id: id,
//         _token: '{{ csrf_token() }}'
//         },
//         success:function(resp){

//     $('#up_id').val(resp.id);
//     $('#upfname').val(resp.FirstName);
//     $('#uplname').val(resp.LastName);
//     $('#upaddress').val(resp.Address);
//     $('#upnumber').val(resp.phonenumber);

//         }
//   });
// });



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
