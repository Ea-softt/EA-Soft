@extends('master')
@section("content")
@section("title") {{ 'Delivery' }} @endsection
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
                    <b>Supplier Delivers List </b>    
        <!-- Button trigger modal -->
            <span class="float:right"><a class="btn btn-primary btn-block btn-sm col-sm-2 float-right" href="javascript:void(0)" data-toggle="modal" 
                data-target="#new_supplier">
                    <i class="fa fa-plus"></i> New Delivery </a></span>         

                    </div>
                    <div class="card-body" style="font-size: 15px;">
                    <!-- Table Panel -->
                        <div class="" id="showsupplierdeliever">
                        <h1 class="text-center text-secondary my-5">Loading... </h1>
                        </div>
          
                                    


            
            

                    </div>
                </div>
            </div>
            
        </div>
    </div>  
</div>


@include("admin.supplier_update")
@include("admin.supplierDeliver_form")

 
{{-- employeeform --}}

<script type="text/javascript">

//fetch all employees
$(document).ready(function(){    
    showAllsupplier();

    function showAllsupplier(){
        _tables("#showsupplierdeliever",'{{ route('fetchall.supplierlivery') }}','List of Supplier Information'); 
    }
  });

//edit employee ajax request
$(document).on('click','.update_supplier',function(e){
  e.preventDefault();
  
  let id = $(this).attr('data-id');
  
   
  $.ajax({
        url: '{{ route('edit.supplier') }}',
        method: 'get',
        data:{id: id,
        _token: '{{ csrf_token() }}'
        },
        success:function(resp){         

    $('#up_id').val(resp.id);
    $('#upcompanyname').val(resp.CompanyName);
    $('#upfullname').val(resp.FullName);
    $('#upaddress').val(resp.Address);
    $('#upnumber').val(resp.Phonenumber);
        
        }
  });
});



//delete supplier information
$(document).on('click', '.delete_supplier', function(e){
    e.preventDefault();
    alert('dsdssd');
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
                    url: '{{ route('delete.supplier') }}',
                    method: 'post',
                    data: {
                    id: id,
                    _token: '{{ csrf_token() }}'
                    },
                    success:function(resp){
                        Swal.fire(
                            'Deleted!',
                            'Supplier deleted Successfully!.',
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