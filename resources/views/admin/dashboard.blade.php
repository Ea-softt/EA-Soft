@extends('master')
@section("content")
@section("title") {{ 'Home' }} @endsection
<main class="mt-1 pt-0">
 @if (session('error'))
    <div class="alert" style="background-color: #e90909">
        {{ session('error') }}
    </div>
    @endif
    <form action="" id="supplierlin">

        <div class="bd-example ">
        <div class=" row-cols-1 row-cols-md-29 g-1  ">
          <div class="col ">
            <div class="card bg-dark" style="margin: -1px; padding: -20px;">
              <div class="card-header  bg-success" style="padding: 0px;" >
          <div class="row ">
            <div class="col-lg-3 border-right ">





               <?php
               for($i = 0; $i <= 31; ++$i){

                $time = strtotime(sprintf('+%d days',$i));
                $day_valye=date('d',$time);
                $days=date('d',$time);
              // printf('<input class="text-center" value="%s">%s',$day_valye,$days);

               }

               ?>
               <input type="hidden" name="days" id="days" value="<?php echo isset ($days)? $days :'' ?>">



               <?php
               for($i = 0; $i <= 12; ++$i){

                $time = strtotime(sprintf('+%d months',$i));
                $monthValue=date('F',$time);
                $monthname=date('F',$time);
                //printf('<option selected value="%s">%s</option>',$monthValue,$monthname);
               }

            date_default_timezone_set("Africa/Accra");
            $date = date("Y-m-d");

               ?>
                {{-- <input type="hidden" name="month" id="month" value="<?php echo isset ($monthname)? $monthname :'' ?>">
               <?php $y=(int)date("Y"); ?>

               <input type="hidden" name="year" id="years" value="<?php echo $y; ?>" >
--}}


              <input type="hidden" id="user" name="user" value="{{ Auth::user()->id }}">
                      

             <?php
               if(isset($EmpID)):
               $fees = $conn->query("SELECT * FROM sales where  username= '$EmpID' and created_date = '$date' ");
                        $classt = 0;
                        $examt = 0;
                    while($row=$fees->fetch_assoc()):
                           $classt += $row['grandtotal'];
            ?>

             <?php
              endwhile;
                 endif;
                    ?>
           {{-- <p >&nbsp &nbsp <i class="fas fa-user-shield"></i> &nbsp <?php echo $FullName;?>&nbsp your  &nbsp Total Sale: Ghc  <?php echo number_format($classt,5);?>   </p>
             --}}



 <p >&nbsp &nbsp<i class="fas fa-calendar-alt"></i> &nbsp Date <?php echo $date;
              ?> </p>




        <!--  <table class="table-responsive-sm text-white">
          <tbody>
            <tr>
              <td valign="baseline"><small>User Logged on:</small></td>
              <td valign="baseline"><small><p class=" ml-5"><i class="fas fa-user-shield"></i> </p></small></td>
            </tr>
            <tr>
              <td valign="baseline"><small class="pb-1">Date:</small></td>
              <td valign="baseline"><small><p class="p-0 ml-5"><i class="fas fa-calendar-alt">&nbsp</i><span id='time'></span></p></small></td>
            </tr>

          </tbody>
        </table> -->
       <!--  <img class="img-fluid m-2 w-100" src="images/logo1.jpg"/> -->
      </div>


    <div class="col-lg-5 border-right" >
     <div class="row">
         <!-- <label>New Name:</label> -->
     <div class="text-white ml-2" style="margin-top: 1px;" ><!-- style="margin-top: -10px;" -->
      <input type="text" class="customer_search "  data-provide="typeahead" id="customer_search" placeholder="Customer Search" name="customername" value="">
       <span class="spans"></span>

       <!-- <label>date:</label> -->
      <div class="form-group  pt-1">
      <input type="date" name="datee" id="datee" class="form-control-sm form-control"  value="<?php echo date('Y-m-d') ?>"  required>
      </div>
    </div>
     <div class="col-sm-2  text-white " style="margin-top: 4px;" ><!--  -->
       <!-- <label>New Name:</label> -->
       <!--  <span class="float:right"><a class="btn-sm btn-info border ml-2" href="javascript:void(0)" id="new_customer"><i class="fas fa-user-plus"></i> New </a></span>
     </div> -->         

          <span class="float:right"><a class="btn-sm btn-info border ml-2" href="javascript:void(0)" data-toggle="modal" 
        data-target="#new_customer">
          <i class="fa fa-plus"></i> New </a></span>
        </div>


     <div class="col-sm-3 text-white " style="margin-top: 4px;"  ><!-- style="margin-top: -8px;" -->
       <!--  <label>Return:</label> -->
        <span class="float:right"><a class="btn-sm btn-info border ml-2" href="javascript:void(0)" id="returns"><i class="fas fa-user-plus"></i> RETURN </a></span>
     </div>

      </div>




</div>

    <div class="col-lg-3 " style="margin: 1px; padding: -4px;"> <!-- margin-bottom: -40px; padding-bottom: -40px -->
      <div class="border text-white text-center bg-danger" style="padding: 1px;">
        <span class="d-flex ">Total(Ghc):&nbsp&nbsp   <p id="totalValue1" class=" ">0.00000</p></span>
         <input type="hidden" class="mult1" id="totalvaluer1in" name="totalsale" value="">
       
       <span class="text-white d-flex ">Grand Total Ghc:
        <p class="" style="" id="totalValue">&nbsp&nbsp0.00000</p></span>
         <input type="hidden" class="mult2" id="totalvaluein" name="grandtotal" >
      
      </div>
    </div> 
</div>
   </div>

    <div class="card-body">
        <div class="row ">

      <div class="col-lg-7 border-right" style="margin-top: -20px;">
      <div id="content" class="mr-1">
      <div id="price_colum" class=" table-responsive-sm table-wrapper-scroll-y my-custom-scrollbar-a">

        <table class="table-striped" style="cursor: pointer;" id="table2">
          <thead>
            <tr class='text-center'>
              <th>Barcode</th>
              <th>Product</th>
              <th>Price</th>
              <th>Unit</th>
              <th>Qty</th>
              <th>Sub.Total</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="tableData">


          </tbody>


        </table>

      </div>


    </div>
  </div>



  <div class="col-lg-5 border-right " style="margin-top: -26px;">
    <div id="sidebar">      
      <div class="input-group mb-2"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span></div>
          <input class="form-control" type="text" placeholder="Product Search" autofocus aria-label="Search" id="search" onfocus="this.value=''"  onkeyup='loadproducts();'/>
        </div>
      <div id="product_area" class="table-responsive-sm mt-1 table-wrapper-scroll-y my-custom-scrollbar" >
        <table class="w-100 " style="cursor: pointer;" id="table1">
          <thead>
            <tr class='text-center text-black'><b>
              <td class='text-center'>Barcode</td>
              <td class='text-center'>Product</td>
              <td class='text-center'>Price</td>
              <td class='text-center'>Unit</td>
              <td class='text-center'>Qty</td>
              <td class='text-center'>Ex Date</td>
           </b></tr>
            </thead>
            <tbody id="products">

            </tbody>
        </table>
      </div>
    </div>
 </div>

</div>

                  <div class="row ">

                <div class="col-lg-5 border-right " style="margin-top: -9px;">
                 <div class="w-100" id="enter_area">
                <button id="buttons" type="button" name='enter' class="Enter btn btn-primary border ml-2"><i class="fas fa-handshake"></i> Finish</button>
                </div>
              </div>

                <div class="col-lg-2 border bg-danger " style="margin-top: -9px;">
               <div id="table_buttons">

                <span class="">Discount(Ghc)<input class="text-center form-control-sm" type="number" name="discount" value="0" min="0"  placeholder="Enter Discount" id="discount" ></span>


               </div>
               <span class="">Cash<input class="text-center form-control-sm" type="radio" name="typeofcash" value="1"    id="typeofcash" ></span>
                 <span class="">E-Cash<input class="text-center form-control-sm" type="radio" name="typeofcash" value="2"   id="typeofcash1" ></span>
                </div>




              <div class="col-lg-5 border-right" style="margin-top: -22px;">
                <div class="w-100 mt-1" id="enter_area">
             <button id="buttons" type="button" class="cancel btn btn-primary border"><i class="fas fa-ban"></i> Cancel</button>
                </div>

              </div>


              </div>


</div>
</div>
</div>
</div>
</div>
</form>
</main>

@include("admin.customer_form")



<script type="text/javascript">
 $.ajaxSetup({
       headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
     });


 $(document).ready(function(){    
    //showAllcustomer();

    function showAllcustomer(){
        _tables("#new_customer",'{{ route('fetchall.customer') }}','List of Customers Information'); 
    }
  });




 // $('#new_customer').click(function(){
 //    uni_modal("Customer Entry","customer.php",'small')

 //  })

$('#returns').click(function(){
    uni_modal("Customer Returns","customerreturn.php",'large')

  })




function loadproducts(){
  var name = $('#search').val();
  if(name){
    $.ajax({
    url: '{{ route('loadproduc') }}',
      type: 'post',
      data: {
        products:name,
        //_token: '{{ csrf_token() }}'
      },
      success: function (Response){
        $('#products').html(Response);
      }
    });
  }
};

$(document).ready(function(){
  $('#customer_search').typeahead({
    source: function(query, result)
    { 
            $.ajax({
          url:'{{ route('customerloa') }}',
          method: "POST",
          data:{
            query:query
          //  _token: '{{ csrf_token() }}'
          },
          dataType: "json",
          success:function(data)
          {
            var loadcust = result($.map(data,function(item){          
            
                return item; 
           }));
          // $('#spans').html(loadcust);

          }
        })
    }
  });
});


function GrandTotal(){
  var TotalValue = 0;
  var TotalPriceArr = $('#tableData tr .totalPrice').get()
  var discount = $('#discount').val();

  $(TotalPriceArr).each(function(){
    TotalValue += parseFloat($(this).text().replace(/,/g, "").replace("Ghc",""));
  });

  /*if(discount != null){
    var f_discount = 0;

    f_discount = TotalValue - discount;

    $("#totalValue").text(accounting.formatMoney(f_discount,{symbol:"₱",format: "%s %v"}));
    $("#totalValue1").text(accounting.formatMoney(TotalValue,{format: "%v"}));
  }else{
    $("#totalValue").text(accounting.formatMoney(TotalValue,{symbol:"₱",format: "%s %v"}));
    $("#totalValue1").text(accounting.formatMoney(TotalValue,{format: "%v"}));
  }*/

   if(discount != null){
    var f_discount = 0;
    var todiscount = 0;

    f_discount = (discount/100)*TotalValue;

        todiscount =(TotalValue-f_discount);


 $("#totalValue").text(todiscount);
    $("#totalValue1").text(TotalValue);
     $("#totalvaluein").text(TotalValue);

  }else{
    $("#totalValue").text(TotalValue);
    $("#totalValue1").text(TotalValue);
  }





        //TotalValue - discount;
/*
    $("#totalValue").text(accounting.formatMoney(todiscount,{symbol:"₱",format: "%s %v"}));
   // $("#totalvaluein").val(accounting.formatMoney(todiscount,{symbol:"Ghc",format: "%s %v"}));

    $("#totalValue1").text(accounting.formatMoney(TotalValue,{format: "%v"}));
//$("#totalvaluer1in").val(accounting.formatMoney(TotalValue,{symbol:"Ghc",format: "%s %v"}));
  }else{
    $("#totalValue").text(accounting.formatMoney(TotalValue,{symbol:"Ghc",format: "%s %v"}));     //(accounting.formatMoney(TotalValue,{symbol:"Ghc",format: "%s %v"}));
    $("#totalvaluein").val(accounting.formatMoney(TotalValue,{symbol:"Ghc",format: "%s %v"})); //(accounting.formatMoney(TotalValue,{symbol:"Ghc",format: "%s %v"}));

    $("#totalValue1").text(TotalValue);   //(accounting.formatMoney(TotalValue,{format: "%v"}));
    $("#totalvalue1in").text(accounting.formatMoney(TotalValue,{format: "%v"}));    //(accounting.formatMoney(TotalValue,{format: "%v"}));
  }*/
};

$(document).on('change', '#discount', function(){
  GrandTotal();
});

$('body').on('click','.js-add',function(){
      var totalPrice = 0;
      var target = $(this);
     // var product = target.attr('data-product');
      var price = target.attr('data-price');
     
    // alert(price);
      var unit = target.attr('data-unt');
      var min = target.attr('data-min');
      var quantity = target.attr('data-quantity');
      var ccprice = target.attr('data-cprice');

    //alert(quantity);

      var currentRow=$(this).closest("tr");

      var barcode=currentRow.find("td:eq(0)").text();
       var product=currentRow.find("td:eq(1)").text();

    // Swal.fire({
    // title: "An input!",
    // text: "Write something interesting:",
    // input: 'text',
    // showCancelButton: true
    // }).then((result) => {
    // if (result.value) {
    //     console.log("Result: " + result.value);
    // }
    // });




    Swal.fire({
        text: 'Enter Qty of '+ product ,
         input: 'number',
      })
      .then((result) => {
        if (result.value == "") {
        Swal.fire("Error","Entered none!","error");
        }else{
          let qtynum = result.value;

        //  let reaqty = quantity;
         // alert(reaqty);
          if (isNaN(qtynum)){
            Swal.fire("Error","Please enter a valid number!","error");
          } else if (qtynum == null){
            Swal.fire("Error","Please enter a number!","error");
           // let qtynumw = result.value;
            } else if (min > quantity){
                Swal.fire("Warning"," Product is finish","warninig");
                return false;
            }else{

               // switch(qtynumw > reaqty)

        //     const qtynumw = result.value;

        //   const reaqty = quantity;

        //      if(qtynumw > reaqty){

        //         Swal.fire("Warning"," Selected Product Quantity is more","warning");
        //      }








            var total = parseInt(result.value,10) * parseFloat(price);
            $('#tableData').append("<tr class='prd'><td input class='ccprice text-center' style='display:none;'>"+ccprice+"</td><td input class='barcode text-center'>"+barcode+"</td><td class='text-center'>"+(product)+"</td><td class='price text-center'>"+price+"</td><td class='text-center'>"+unit+"</td><td class='qty text-center'>"+result.value+"</td><td class='totalPrice text-center'>"+total+"</td><td class='text-center p-1'><button class='btn btn-danger btn-sm' type='button' id='delete-row'><i class='fas fa-times-circle'></i></button><tr>");
            GrandTotal();

             $('#search').focus();


       }
      }
  });
});

$(document).ready(function(){
    document.getElementById("search").focus();
 });

$("body").on('click','#delete-row', function(){
    var target = $(this);
    Swal.fire({
      title: "Remove this item?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        $(this).parents("tr").remove();
        Swal.fire("Removed Successfully!", {
          icon: "success",
        });
          GrandTotal();
      }
  });
});

// Payment section
$(document).on('click','.Enter',function(){

  var TotalPriceArr = $('#tableData tr .totalPrice').get();
   var typeofcash = $("input[name='typeofcash']:checked").val();

 /* if($.trim($('#customer_search').val()).length == 0){
      swal("Warning","Please Enter Customer Name!","warning");
      return false;
    }*/

    if(typeofcash == undefined){
    Swal.fire("Warning","Please Select The Type Of Cash !","warning");
      return false;
    }

  if (TotalPriceArr == 0){
    Swal.fire("Warning","No products ordered!","warning");
    return false;
  }else{

    var product = [];
    var quantities = [];
    var price = [];
    var ccprice = [];
   //var grandtotal = $('#totalvaluein').val();
    var days = $('#days').val();
    var month = $('#month').val();
    var user = $('#user').val();
    var years = $('#years').val();
    var customer = $('#customer_search').val();
    var discount = $('#discount').val();
    var datee = $('#datee').val();

   //alert(user)

     $('.ccprice').each(function(){
     ccprice.push($(this).text());
    });

    $('.barcode').each(function(){
     product.push($(this).text());
    });
    $('.qty').each(function(){
    quantities.push($(this).text());
    });
    $('.price').each(function(){
      price.push($(this).text().replace(/,/g, "").replace("Ghc",""));
    });
    var grandtotals = parseFloat($('#totalValue').text().replace(/,/g, "").replace("Ghc",""));


    Swal.fire({
      text: 'Enter Cash of '+ grandtotals,
         input: 'number',
    })
    .then((results) => {
      if(results.value == "") {
        Swal.fire("Error","Entered None!","error");
      }else{

        var qtynum = results.value;
        if(isNaN(qtynum)){
            Swal.fire("Error","Please enter a valid number!","error");
        }else if(qtynum == null){
          Swal.fire("Error","Entered None!","error");
        }else{

          var change = 0;
          // var TotalPriceArr = $('#tableData tr .totalPrice').get()
          // $(TotalPriceArr).each(function(){
          //   TotalValue += parseFloat($(this).text().replace(/,/g, "").replace("₱",""));
          // });
          var grandtotal = parseFloat($('#totalValue').text().replace(/,/g, "").replace("Ghc",""));

          var TotalValue = parseFloat($('#totalValue1').text().replace(/,/g, "").replace("Ghc",""));


          if(grandtotal > qtynum){
            Swal.fire("Error","Can't process a smaller number","error");
          }else{
            change = parseFloat(results.value) - parseFloat(grandtotal);

            $.ajax({
              url:'{{ route('insert_sales') }}',
              method:"post",
             // _token: '{{ csrf_token() }}'
        data:{Totalvalue:TotalValue, product:product, price:price, grandtotal:grandtotal, days:days, month:month, user:user, years:years, customer:customer, quantities:quantities, discount:discount, typeofcash:typeofcash, datee:datee, ccprice:ccprice},
              success: function(data){
              console.log(data);
                if(data){
                  Swal.fire({
                    title: "Change is " + accounting.formatMoney(change,{symbol:"Ghc",format: "%s %v"}),
                    icon: "success",
                    buttons: "Okay",
                  })
                  .then((okay)=>{
                    if(okay){
                    setTimeout(function(){
                    var nw = window.open("receiptsale.php?reciept_no="+data+"","_blank","width=900px,height=600px");
                      setTimeout(function(){
                       nw.print()
                     setTimeout(function(){
                  nw.close()
                  location.reload()
               },500)
              },500)
            },500)
                }
                  })
                }else{
                  window.location.href='mainpa.php?'+data;
                }

              }
            });
          }
        }
      }
    });
  }
});



$(document).on('click','.cancel',function(e){
  var TotalPriceArr = $('#tableData tr .totalPrice').get();
  if (TotalPriceArr == 0){
    return 0;
  }else{
    swal({
      title: "Cancel orders?",
      text: "By doing this,orders will remove!",
      icon: "warning",
      buttons: ["No","Yes"],
      dangerMode: true,
    })
    .then((reload) => {
      if (reload) {
        location.reload();
      }
    });
  }
});
/*
function out(){
  var lag = "logout";
  swal({
      title: "Logout?",
      icon: "warning",
      buttons: ["Cancel","Yes"],
      dangerMode: true,
    })
    .then((value) => {
      if(value){
        if(lag){
            $.ajax({
              type: 'post',
              data: {
                logout:lag
              },
              url: 'server/connection.php',
              success: function (data){
                window.location.href='index.php';
              }
            });
        }
      }
    })
};*/

</script>
@endsection

