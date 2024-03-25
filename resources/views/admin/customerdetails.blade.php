@extends('master')
@section("content")
@section("title") {{ 'S Statistics' }} @endsection
<main class="w-100">

	<div class="col-lg-12">	
		 <div class="card">
            
			<div class="card-header">
				 
            <div class="row justify-content-center pt- bg-success">
                <!-- <label for="" class="mt-2">From</label>
                <div class="col-sm-2">
                    <input type="date" name="start_date" id="datefrom" placeholder="From Date"  class="form-control">
                 </div>
                 <label for="" class="mt-2">To</label>
                
                 <div class="col-sm-2">
                    <input type="date" name="end_date" id="dateto" placeholder="To Date"  class="form-control">
                 </div>

                 <div class=" pb-2">
                    <button type="button" name="search" id="search" class="form-control btn-primary">Range</button>
                </div> -->
                </div>
           </div>




<div class="modal fade" id="uni_modal" role='dialog'>

      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header bg-success">
          <h5 class="modal-title text-white">Reciept Dat</h5>
          <button type="button" class="btn-danger btnn"  data-dismiss="modal" aria-label="Close"><span class="fa fa-times"></span></button> <i class="">
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer btnn">
          <button type="button" class="btn btnn btn-primary" id='submit' onclick="$('#uni_modal form').submit()"><i class="fas fa-thumbs-up">&nbsp&nbsp</i>Save</button>
          <button type="button" class="btn btnn btn-danger" id="" data-dismiss="modal"><i class="fas fa-ban">&nbsp&nbsp</i>Cancel</button>
        </div>
        </div>
      </div>
    </div> 

















           			<div class="card_body">
					<div class=" pb-2" style="font-size: 15px;">
					<!-- Table Panel -->
						

          <table class="table table-striped table-sm text-center align-middle table-condensed table-bordered table-hover">
            <thead>
                <tr>
                  
                    <th class="text-center">Customer name</th>
                    <th class="text-center">Discount.</th>
                    <th class="text-center">Total.</th>
                    <th class="text-center">Grandtotal</th>   
                      <th class="text-center">Cash_Type</th>                  
                    <th class="text-center">Date</th> 
                    <th class="text-center">Print</th> 
                </tr>
            </thead>
            <tbody>
                          
        @foreach($cust as $cus)

                    <tr>
                      
                       
                     <td>{{$cus->cust}}</td>                
                     <td>{{$cus->disc}}</td>
                     <td>{{$cus->totals}}</td>
                     <td>{{$cus->grand}}</td> 
                     <td>{{$cus->cashtype}}</td> 
                     <td>{{$cus->dates}}</td> 
                     <td>
                        
            <button class="btn btn-sm btn-outline-primary  view_sales"  type="button" recipid='{{$cus->recieptid}}'
                      >View</button>



                    </td>  
                    

                    </tr>
        
        </tbody>      
           
            @endforeach

        </table>
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
        _tables("#showstock",'{{ route('fetc_customerdetails') }}','List of stock Information');
    }
  });


  }
});

$(document).ready(function(){


    showstatistics();

    function showstatistics(){
        _tables("#showstock",'{{ route('fetc_customerdetails') }}','List of stock Information');
    }
  });


/*$(document).on('click','.view_sales', function(e){
e.preventDefault()
var receipt = $(this).attr('id');
alert(receipt);

});*/
/*$('.view_sales').click(function(){

 

    uni_modal("Report Details","{{ route('view_custome') }}?recipid="+$(this).attr('recipid')+"","mid-large")


  })
*/



$(document).on('click', '.view_sales', function(e){
        e.preventDefault()
        //start_load()
        $.ajax({
            url: "{{ route('view_custome') }}?recipid="+$(this).attr('recipid')+"",
            error:err=>{
                console.log()
                alert("An error occured")
            },
            success:function(resp){
                if(resp){
                    $('#uni_modal .modal-title').html('Report Details')
                    $('#uni_modal .modal-body').html(resp)
                    if('mid-large' != ''){
                        $('#uni_modal .modal-dialog').addClass('mid-large')
                    }else{
                        $('#uni_modal .modal-dialog').removeAttr("class").addClass("modal-dialog modal-lg")

                    }
                    $('#uni_modal').modal({
                      show:true,
                      backdrop:'static',
                      keyboard:false,
                      focus:true
                    })
                    end_load()
                }
            }
        })
    });














</script>
@endsection
