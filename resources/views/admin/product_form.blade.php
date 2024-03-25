@extends('master')
@section("content")



<main class="">
   <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-2 border-bottom bg-success ">
        <h1 class="h2" style="margin-left: 15%">From Warehouse to Stock</h1>

      </div>


<form action="#" method="post" id="productts" enctype="multipart/form-data">
    @csrf
 <div class="row">
    <div class="col-lg-7 border-right  ">



    <div class="form-group">

              <input type="hidden" id="location" class="location" name="location" value="<?php echo date('s', strtotime('now'));?>">

              <input type="hidden" id="location1" class="location1" name="location1" value="<?php echo date('Y-m-d', strtotime('now'));?>">

            </div>


<div id="content" class="mr-15">

    <div id="price_column" class="table-responsive-sm  m-2 table-responsive-sm table-wrapper-scroll-y my-custom-scrollbar-y">



    <table  class="" style="cursor: pointer;" >
      <thead>
        <tr class='text-center'>
            <th class='text-center'>ID</th>
          <th class='text-center'>Barcode</th>
          <th class='text-center'>SPrice</th>
          <th class='text-center'>min_stock</th>
          <th class='text-center'>Product</th>
          <th class='text-center'>CPrice</th>
          <th class='text-center'>Qty</th>
          <th class='text-center'>Unit</th>
         <!--  <th>Sub.Total</th>  -->
         <!--  <th>Description</th> -->
        </tr>
      </thead>
      <tbody id="tableData1">
      </tbody>
    </table>

</div>
   </div>
</div>




<div class="col-lg-5">

      <div class="mb-60 ">

        </div>

        <div id="product_area" class="m-3 pl-2 pt-2 table-responsive-sm table-wrapper-scroll-y my-custom-scrollbar-a" >
          <h1 class="text-center text-secondary my-5">Loading... </h1>



        </div>







<div class="modal-footer">
    <button type="button" class="btn btn-primary" id='submit'><i class="fas fa-thumbs-up">&nbsp&nbsp</i>Save</button>
<button type="button" id="cancel" class="btn btn-danger" ><i class="fas fa-ban">&nbsp&nbsp</i>Cancel</button>
</div>
 </div>



</div>


</form>


<style>
    .btnn{
        display: none;
    }
    img#cimg{
        max-height: 27vh;
        max-width: 13vw;
    }
</style>

<script>
 $.ajaxSetup({
       headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
     });




$(document).ready(function(){
$('#mytable').ddTableFilter();    
    showAllproductstore();

    function showAllproductstore(){
        _table("#product_area",'{{ route('fetchform.product') }}','List of Warehouse Information'); 
    }
  });


/*
$(document).ready(function(){
  showAllproductstore();

 function showAllproductstore(){
	$.ajax({
		url: '{{ route('fetchform.product') }}',
		method: 'get',
		success:function(resp){
			$("#productstore").html(resp);
		}

	});


 // $('.table').dataTable();
 }


  });*/









  $(document).on('click', '.tablet', function(){
   // var newline = "\n";
    var sendToNum = $('#tableData1');
    sendToNum.text('');
    $("input[name=check]:checked").each(function() {
      var sid = $(this).parent().nextAll('td').eq(0).html();
      var product = $(this).parent().nextAll('td').eq(1).html();
      var price = $(this).parent().nextAll('td').eq(2).html();
      var quantity = $(this).parent().nextAll('td').eq(3).html();
      var  unit= $(this).parent().nextAll('td').eq(4).html();
    // var product_id = $(this).parent().nextAll('td').eq(5).html();
      var description = $(this).parent().nextAll('td').eq(5).html();
      var expiredate = $(this).parent().nextAll('td').eq(6).html();
      var multtota = $(this).parent().nextAll('td').eq(7).html();
      var barc = $(this).parent().nextAll('td').eq(8).html();
      var supplierid = $(this).parent().nextAll('td').eq(7).html();
      var add = parseFloat(1.5);
      var add1 =  parseFloat(price)
       var sprice = (add1+add);
       var dateee = $("#location").val();
        var expire = $("#location1").val();
        var supp = $(".supplierid").val();
       var datee = dateee++;
      var min_stock = parseFloat(1);
      // alert (product_id);

      sendToNum.append("<tr class='prd'><td class='sid text-center' contenteditable>"+sid+"</td><td class='barcode text-center' contenteditable>"+sid+""+dateee+""+barc+"</td><td class='sprice text-center' contenteditable>"+sprice+"</td><td class='min_stock text-center' contenteditable>"+min_stock+"</td><td class='product text-center' contenteditable>"+product+"</td><td class='cprice text-center'contenteditable>"+accounting.formatMoney(price,{symbol:"Ghc",format: "%s %v"})+" </td><td class='quantity1 text-center' contenteditable>"+quantity+"</td><td class='unit1 text-center'contenteditable>"+unit+"</td><td style='display:none;' class='multtota text-center'contenteditable>"+accounting.formatMoney(multtota,{symbol:"Ghc",format: "%s %v"})+"</td></td><td class='description text-center' style='display:none;' contenteditable>"+description+"</td><td style='display:none;'  class='supplierid text-center' contenteditable>"+supplierid+"</td><td class='text-center p-1'contenteditable></tr>");


    });
  });

var $selectAll = $('#selectall'); // main checkbox inside table thead
  var $table = $('.table1'); // table selector
  var $tdCheckbox = $table.find('tbody input:checkbox'); // checboxes inside table body
  var tdCheckboxChecked = 0; // checked checboxes

  // Select or deselect all checkboxes depending on main checkbox change
  $selectAll.on('click', function () {
    $tdCheckbox.prop('checked', this.checked);
  });







$(document).on('click', '#cancel', function(){
   Swal.fire({
      title: "Cancel orders?",
      text: "By doing this,orders will remove!",
      icon: "warning",
      buttons: ["No","Yes"],
      dangerMode: true,
    })
   .then((reload) => {
      if (reload) {
        location.reload();
        window.location.href='product.php?'
      }
    });


});



$('#search').focus();

function loadprod(){
  var name = $("#search1").val();
  if(name){
    $.ajax({
      type: 'post',
      data: {
        products:name,
      },
      url: 'dropdownstock.php',
      success: function (Response){
        $('#products').html(Response);
      }
    });
  }
};




function displayImg(input,_this) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#cimg').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}



/*
function loadpro(){
  var name = $("#search").val();
  if(name){
    $.ajax({
      type: 'post',
      data: {
        products:name,
      },
      url: 'stockdropdown.php',
      success: function (Response){
        $('#products').html(Response);
      }
    });
  }
};*/




$("body").on('click','#delete-row', function(){
    var target = $(this);
    swal({
      title: "Remove this item?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        $(this).parents("tr").remove();
        swal("Removed Successfully!", {
          icon: "success",
        });
          GrandTotal();
      }
  });
});

/*$('#productts').submit(function(e){
        e.preventDefault()*/


$(document).on('click', '#submit', function(e){
    e.preventDefault()
   var sid = [];
    var product = [];
    var barcode = [];
    var sprice = [];
    var cprice = [];
    var unit1 = [];
    var quantity1 =[];
   // var product = $('#product').val();
    var multtota = [];
    var description = [];
    var picture = [];

    var expiredate =[];
    var min_stock = [];
    var location =  $('#location').val();
    var images = $('#images').val();
    var supplierid =[];

     $('.sid').each(function(){
        sid.push($(this).text());
     });
      $('.supplierid').each(function(){
        supplierid.push($(this).text());
     });

     $('.product').each(function(){
        product.push($(this).text());
    });

    $('.barcode').each(function(){
     barcode.push($(this).text());
     });


      $('.sprice').each(function(){
      sprice.push($(this).text().replace(/,/g, "").replace("Ghc",""));
         });

      $('.cprice').each(function(){
      cprice.push($(this).text().replace(/,/g, "").replace("Ghc",""));
    });

    $('.unit1').each(function(){
         unit1.push($(this).text());

    });

   $('.quantity1').each(function(){
         quantity1.push($(this).text());

    });
    $('.expiredate').each(function(){
        expiredate.push($(this).text());

    });
    $('.min_stock').each(function(){
        min_stock.push($(this).text());
       });
    $('.description').each(function(){
        description.push($(this).text());
       });



     Swal.fire({
      title: "Are you sure to save Selected Product?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
        .then((willsave) => {
      if (willsave) {



            $.ajax({
              url:'{{ route('insertform.product') }}',
              method:"POST",
              data:{product:product,barcode:barcode,sprice:sprice,cprice:cprice,unit1:unit1,quantity1:quantity1,expiredate:expiredate,sid:sid,min_stock:min_stock,description:description,images:images,location:location,supplierid:supplierid},
              success: function(data){
                //alert('okk')

                if(data = "success"){

                 alert_toast("Data successfully saved.",'success')
                         setTimeout(function(){

                       window.location.href='{{ route('form.product') }}';
                         },900)
                 }
                 else{
                // window.location.href='productform.php?'+data;
                 }

              }

            });
        }

          });

        //window.location.href='productform.php'+data;
        // window.location.href='productform.php?'+data;
      /*$('#SupplierDeliverlist').click(function(){
    uni_modal("Suppliers Entry","SupplierDeliverlistcontrol.php",'large')

  })*/

   });

































/*
$('#products').submit(function(e){
        e.preventDefault()
        start_load()
        $('#msg').html('')*/
















/* function FetchState(sid){
    $('#StudentName').html('');
    $.ajax({
        type:'post',
        url: 'stockdropdown.php',
        data:{aja_id :sid},
        success : function(data){
            $('#StudentName').html(data);
             return false;
        }

    })
   }*/


    $('#new_supplier').submit(function(e){
        e.preventDefault()
        start_load()
        $('#msg').html('')
      /*  if($('#new_supplier').find('[fname]').length <= 0){
            alert_toast("Please insert atleast 1 row in the fees table",'danger')
            end_load()
            return false;
        }*/

        $.ajax({
            url:'easoftfun.php?action=new_supplier',
            data: new FormData($(this)[0]),
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST',
            success:function(resp){
                if(resp==1){
                    alert_toast("Data successfully saved.",'success')
                        setTimeout(function(){
                            location.reload()
                        },1000)
                }else if(resp == 2){
                $('#msg').html('<div class="alert alert-danger mx-2">Already exist, So Check the Names And The Phone Number.</div>')
                end_load()
                }
            }
        })
    })

    $('.select2').select2({
        placeholder:"Search of products in the warehouse",
        width:'100%'
    })

</script>
@endsection
