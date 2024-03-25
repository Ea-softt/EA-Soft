@extends('master')
@section("content")

@section("title") {{ 'Statistics' }} @endsection
<div class="container-fluid">
    <div class="col-lg-12">
        <div class="card">
            <div class="card_body">
            <div class="row justify-content-center pt-4 bg-success">
                <label for="" class="mt-2"></label>
                <div class="col-sm-3">
                    <input class="form-control" name="searchtext" type="text" placeholder="NewStock Product Search"  aria-label="Search" id="searchtext" />
                 </div>

                 <div class="btn-success pb-2">
                    <button type="button" name="search" id="search" class="form-control btn-primary">Search</button>
                </div>
                </div>
            </div>
            <hr>
            <div class="col-md-12">
                
            <div class="card-body" style="font-size: 15px;">
          <!-- Table Panel -->
            <div class="" id="shownewstock">
            <h1 class="text-center text-secondary my-5">Loading... </h1>
            </div>

          </div>
            </div>
            </div>
        </div>
    </div>
</div>
<noscript>
  <style>
    table#report-list{
      width:100%;
      border-collapse:collapse
    }
    table#report-list td,table#report-list th{
      border:1px solid
    }
        p{
            margin:unset;
        }
    .text-center{
      text-align:center
    }
        .text-right{
            text-align:right
        }
  </style>
</noscript>
<script>
$(document).ready(function(){
    $('.table1').dataTable()
  
$('#report-list').ddTableFilter();
  });

/*$('#month').change(function(){
    location.replace('{{ route('fetchall.warehouseupdateloadnew') }}?page=loaded_stock&month='+$(this).val())
});*/


/*function loadproducts(){*/
$(document).on('click', '#search', function(){
  
  var name = $('#searchtext').val();
  //alert(name);
  if(name){
    $.ajax({
    url: '{{ route('search.productstat') }}',
      type: 'post',
      data: {
        products:name,
        //_token: '{{ csrf_token() }}'
      },
      success: function (Res){
       // alert(Res.status)
        $('#shownewstock').html(Res);
      }
    });
  }else{
    Swal.fire("Error","Check The Input Is Empty!","error");

$(document).ready(function(){    
    showAllnewstock();

    function showAllnewstock(){
        _tables("#shownewstock",'{{ route('fetch.productstat') }}','List of newstock Information'); 
    }
  });


  }
});






$(document).ready(function(){    
    showAllnewstock();

    function showAllnewstock(){
        _tables("#shownewstock",'{{ route('fetch.productstat') }}','List of Warehouse Information'); 
    }
  });

$(document).on('click', '.delete_newstock', function(e){
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
                    url: '{{ route('delete.newstock') }}',
                    method: 'post',
                    data: {
                    id: id,
                    _token: '{{ csrf_token() }}'
                    },
                    success:function(resp){
                        Swal.fire(
                            'Deleted!',
                            'Product From the newstock Deleted Successfully!.',
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


 $('.delete_warehouseupdateload').click(function(){
    _conf("Are you sure to delete this Product?","delete_warehouseupdateload",[$(this).attr('data-id')])
  })
</script>

@endsection