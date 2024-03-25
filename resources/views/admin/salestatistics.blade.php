@extends('master')
@section("content")
@section("title") {{ 'S Statistics' }} @endsection
<main class="w-100">

	<div class="col-lg-12">	
		 <div class="card">
            
			<div class="card-header">
				 
            <div class="row justify-content-center pt-2 bg-success">
                <label for="" class="mt-2">From</label>
                <div class="col-sm-2">
                    <input type="date" name="start_date" id="datefrom" placeholder="From Date"  class="form-control">
                 </div>
                 <label for="" class="mt-2">To</label>
                
                 <div class="col-sm-2">
                    <input type="date" name="end_date" id="dateto" placeholder="To Date"  class="form-control">
                 </div>

                 <div class=" pb-2">
                    <button type="button" name="search" id="search" class="form-control btn-primary">Range</button>
                </div>
                </div>
           </div>




           			<div class="card_body">
					<div class=" pb-2" style="font-size: 15px;">
					<!-- Table Panel -->
						<div class="" id="showstock">
						<h1 class="text-center text-secondary my-5">Loading... </h1>
						</div>







					</div>
			
			

		</div>
	</div>
</div>


@include("admin.customer_update")



{{-- employeeform --}}

<script type="text/javascript">

//$('mytable').ddTableFilter();
$(document).on('click', '#search', function(){
  
   var datefrom = $('#datefrom').val();
    var dateto = $('#dateto').val();

    	
//alert('eerer');
    if(datefrom  != '' && dateto != ''){
    $.ajax({
    url: '{{ route('search.productstat') }}',
      type: 'post',
      data: {datefrom:datefrom,dateto:dateto
        //_token: '{{ csrf_token() }}'
      },
      success: function (Res){
      // alert(Res);
        $('#showstock').html(Res);
      }
    });
  }else{
    Swal.fire("Error","Check The Input Is Empty!","error");

$(document).ready(function(){    
    showstatistics();

    function showstatistics(){
        _tables("#showstock",'{{ route('fetchs.statistics') }}','List of stock Information');
    }
  });


  }
});

$(document).ready(function(){
    showstatistics();

    function showstatistics(){
        _tables("#showstock",'{{ route('fetchs.statistics') }}','List of stock Information');
    }
  });



// the from the product in the stock
$(document).on('click', '.btn_delete', function(e){
	e.preventDefault();
	let id = $(this).attr('data-delete');
	
	_deletes(id, '{{ route('deletes.stock'), 'Product' }}');
});


</script>
@endsection
