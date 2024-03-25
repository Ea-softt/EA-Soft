@extends('master')
@section("content")
@section("title") {{ 'History' }} @endsection
<main class="">
   <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-2 border-bottom bg-success ">
        <h1 class="h2" style="margin-left: 15%">Warehouse update</h1>
        
      </div>


<form action="#" method="post" id="productts" enctype="multipart/form-data">
    @csrf
 <div class="row">
    <div class="col-lg-6 border-right  ">



    <div class="form-group">

              <input type="hidden" id="location" class="location" name="location" value="<?php echo date('s', strtotime('now'));?>">

              <!-- <input type="hidden" id="location1" class="location1" name="location1" value="<?php echo date('Y-m-d', strtotime('now'));?>"> -->

    </div>


<div id="content" class="mr-15">

    <div id="price_column" class="table-responsive-sm  m-2 table-responsive-sm table-wrapper-scroll-y my-custom-scrollbar-y">



    <table  class="" style="cursor: pointer;" >
      <thead>
        <tr class='text-center'>
            <th class='text-center'>ID</th>
              <th class='text-center'>CompanyID</th>
              <th class='text-center'>Product</th>
              <th class='text-center'>Quantity</th>
              <th class='text-center'>U Cost</th>            
              <th class='text-center'>Unit</th>                         
              <th class='text-center'>Description</th>
         
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
        _table("#product_area",'{{ route('fetch.warehousenewload') }}','Warehouse New'); 
    }
  });






$(document).on('click', '.tablet', function(){
   // var newline = "\n";
    var sendToNum = $('#tableData1');
    sendToNum.text('');
    $("input[name=check]:checked").each(function() {
      var sid = $(this).parent().nextAll('td').eq(0).html();   
       var companyname = $(this).parent().nextAll('td').eq(7).html(); 
      var product = $(this).parent().nextAll('td').eq(1).html();
       var quantity = $(this).parent().nextAll('td').eq(3).html();  
      var price = $(this).parent().nextAll('td').eq(2).html();      
      var  unit= $(this).parent().nextAll('td').eq(4).html();
      var description = $(this).parent().nextAll('td').eq(5).html();    
      var expiredate = $(this).parent().nextAll('td').eq(7).html(); 
      var multtota = $(this).parent().nextAll('td').eq(9).html(); 
      var barc = $(this).parent().nextAll('td').eq(8).html(); 
     // var supplierid = $(this).parent().nextAll('td').eq(9).html(); 
      var quantity1 = parseFloat(0);
      var price1 =  parseFloat(0);
    // var tcost1 = parseFloat(0);
       /*var tprice = (quantity*price);
       var dateee = $("#location").val();
        var supp = $(".supplierid").val();
       var datee = dateee++;*/
      
      

      sendToNum.append("<tr class='prd text-center'><td class='sid text-center'>"+sid+"</td><td class='companyname  text-center'>"+companyname+"</td><td class='product text-center' >"+product+"</td><td class='quantity1 text-center' contenteditable>"+quantity1+"</td><td class='price1 text-center'contenteditable>"+price+" </td><td class='unit1 text-center'contenteditable>"+unit+"</td><td class='description text-center' contenteditable>"+description+"</td></td>");
      
   


    /*  <td style='display:none;' class='multtota text-center'contenteditable>"+accounting.formatMoney(multtota,{symbol:"Ghc",format: "%s %v"})+"</td>*/

/*accounting.formatMoney(price,{symbol:"Ghc",format: "%s %v"})  */
    });
  });

//let $selectAll = $('.selectall'); // main checkbox inside table thead
  let $table = $('.table1'); // table selector 
  let $tdCheckbox = $table.find('tbody input:checkbox'); // checboxes inside table body
  let tdCheckboxChecked = 0; // checked checboxes

  
  $(document).on('click', '#selectall', function(){
     
 let $selectAll = $('#selectall'); // main checkbox inside table thead
  let $table = $('.table1'); // table selector 
  let $tdCheckbox = $table.find('tbody input:checkbox'); // checboxes inside table body
  let tdCheckboxChecked = 0;

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
        //location.reload();
        window.location.href='{{ route('show.warehouse') }}'
      }
    });


});


  $(document).on('click', '#submit', function(){
   var sid = [];
    var companyname  = [];  
    var product  = [];
     var quantity1 = [];
    var price1 = [];  
   // var tcost1  = [];
     var description = [];
    var expiredate = [];  
     var unit = [];
    
      var result = 0;
   
     $('.sid').each(function(){
        sid.push($(this).text());
     });
    // alert (sid);
      $('.companyname').each(function(){
       companyname.push($(this).text());
     });

     $('.product').each(function(){
        product.push($(this).text());
    });

   
           
      $('.price1').each(function(){
      price1.push($(this).text().replace(/,/g, "").replace("Ghc",""));
    
         });    


       $('.quantity1').each(function(){
    quantity1.push($(this).text());     
    
     });

    $('.unit1').each(function(){
         unit.push($(this).text());

    });

 
    $('.expiredate').each(function(){
        expiredate.push($(this).text());

    });
   
    $('.description').each(function(){
        description.push($(this).text());
       });
   

        Swal.fire({
      title: "Are you sure to update Selected Product?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
        .then((willsave) => {
      if (willsave) {

            $.ajax({
              url:'{{ route('update.warehousenewinsert') }}',
              method:"POST",        
              data:{companyname:companyname,product:product,quantity1:quantity1,price1:price1,unit:unit,expiredate:expiredate,description:description,sid:sid},
              success: function(data){
             // alert(data.status);
                
                if(data.status == 0){  

                  alert_toast("No Product is Selected.",'danger')
                       
                }
                else if(data.status == 1){
                 alert_toast("Product Added Successfully",'success')
                        setTimeout(function(){

                            window.location.href='{{ route('show.warehousenewload') }}';
                        },900)
                }else{
                   alert_toast("Something happened.",'warning') 
                }  
                
              }

            });
          
       }
    });
  
});

 </script>
@endsection
