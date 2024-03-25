@extends('master')
@section("content")
@section("title") {{ 'Home' }} @endsection
<main class="mt-2 pt-1">

    <form action="" id="supplierlin">
 
        <div class="bd-example ">
        <div class=" row-cols-1 row-cols-md-29 g-1  ">          
          <div class="col ">
            <div class="card bg-dark">
              <div class="card-header p-0  bg-success">
          <div class="row ">
            <div class="col-lg-4 border-right ">



                  
              
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
                           
               
             
              <input type="hidden" id="user" name="salername" value="<?php echo $EmpID;?>">
                      --}}

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


         <div class="col-lg-4 border-right ">
          <div class="row">
       <div class="text-white mt-0 ml-5">
        <label>  Customer Name:</label>
      <input type="text" class="form-control customer_search " autocomplete="off" data-provide="typeahead" id="customer_search" placeholder="Customer Search" name="customername" value="">
      </div>
     <div class="col-sm-3 mt-5 pt-4 text-white ">
       <!-- <label>New Name:</label> -->
        <span class="float:right"><a class="btn-sm btn-info border ml-2" href="javascript:void(0)" id="new_customer"><i class="fas fa-user-plus"></i> New </a></span>
     </div>
     <div class="col-sm-3 mt-5 pt-4  text-white ">
       <!--  <label>Return:</label> -->
        <span class="float:right"><a class="btn-sm btn-info border ml-2" href="javascript:void(0)" id="returns"><i class="fas fa-user-plus"></i> RETURN </a></span>
     </div>
     <div class="form-group">
      <input type="date" name="datee" id="datee" class="form-control-sm form-control"  value="<?php echo date('Y-m-d') ?>"  placeholder="Expire Date" required>
    </div>
      </div>




</div>

      <div class="col-lg-3 ml-30 mult">
      <div class="border text-white text-center bg-danger">
        <label class="d-flex ">Total(Ghc):&nbsp&nbsp   <p id="totalValue1" class="mb-20 ">0.00000</p></label>
         <input type="hidden" class="mult1" id="totalvaluer1in" name="totalsale" value="">
        <div >
       
       
        </div>
       <span class="text-white d-flex ">Grand Total Ghc:        
        <p class="" style="font-size: 20px;" id="totalValue">&nbsp&nbsp0.00000</p></span> 
         <input type="hidden" class="mult2" id="totalvaluein" name="grandtotal" >
      </div>
    </div>  
</div>
   </div>

        <div class="card-body">              
        <div class="row "> 
      
      <div class="col-lg-7 border-right "> 
      <div id="content" class="mr-15">
      <div id="price_column" class="m-2 table-responsive-sm table-wrapper-scroll-y my-custom-scrollbar-a">
        
        <table class="table-striped w-100 font-weight-bold" style="cursor: pointer;" id="table2">
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



  <div class="col-lg-5 border-right "> 
    <div id="sidebar">      
      <div class="mb-60 ">
      <div class="input-group"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span></div>
          <input class="form-control" type="text" placeholder="Product Search" autofocus aria-label="Search" id="search" onfocus="this.value=''"  onkeyup="loadproducts();"/>
        </div></div>
      <div id="product_area" class="table-responsive-sm mt-2 table-wrapper-scroll-y my-custom-scrollbar" >
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
      
                <div class="col-lg-5 border-right ">
                 <div class="w-100 mt-2" id="enter_area">
                <button id="buttons" type="button" name='enter' class="Enter btn btn-primary border ml-2"><i class="fas fa-handshake"></i> Finish</button>
                </div>
              </div>

                <div class="col-lg-2 border bg-danger ">
               <div id="table_buttons">        
                          
                <span class="">Discount(Ghc)<input class="text-center form-control-sm" type="number" name="discount" value="0" min="0"  placeholder="Enter Discount" id="discount" ></span>  
                      
        
               </div>
               <span class="">Cash<input class="text-center form-control-sm" type="radio" name="typeofcash" value="1"    id="typeofcash" ></span>
                 <span class="">E-Cash<input class="text-center form-control-sm" type="radio" name="typeofcash" value="2"   id="typeofcash1" ></span>   
                </div>




              <div class="col-lg-5 border-right ">
                <div class="w-100 mt-2" id="enter_area">
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

<script type="text/javascript">


 $('#new_customer').click(function(){
    uni_modal("Customer Entry","customer.php",'small')
    
  })

$('#returns').click(function(){
    uni_modal("Customer Returns","customerreturn.php",'large')
    
  })




function loadproducts(){
  var name = $("#search").val();
  if(name){
    $.ajax({
      type: 'post',
      data: {
        products:name,
      },
      url: 'loadproducts.php',
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
          url: 'loadcustomer.php',
          method: "POST",
          data:{
            query:query
          },
          dataType: "json",
          success:function(data)
          {
            result($.map(data,function(item){
              return item;
            }));
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

    f_discount = discount/100*TotalValue; 
          
        todiscount =TotalValue-f_discount;


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
     // var barcode = target.attr('data-barcode');
      var unit = target.attr('data-unt');
      var min = target.attr('data-min');  
      var quantity = target.attr('data-quantity');
      var ccprice = target.attr('data-cprice');



      var currentRow=$(this).closest("tr"); 

      var barcode=currentRow.find("td:eq(0)").text();
       var product=currentRow.find("td:eq(1)").text();




     
      swal({          
        title: "Enter number of items:",
        content: "input",
      })
      .then((value) => {
        if (value == "") {
          swal("Error","Entered none!","error");
        }else{
          var qtynum = value;
          if (isNaN(qtynum)){
            swal("Error","Please enter a valid number!","error");
          }else if(qtynum == null){
            swal("Error","Please enter a number!","error");
          }else{        

            if(value >= quantity){
              swal("Warning","Please Check Selected Product Quantity","warning");
             
            }
            if(min >= quantity){
              swal("Warning","Please Selected Product is getting finish","warning");
             
            }



           
            var total = parseInt(value,10) * parseFloat(price);
            $('#tableData').append("<tr class='prd'><td input class='ccprice text-center' style='display:none;'>"+ccprice+"</td><td input class='barcode text-center'>"+barcode+"</td><td class='text-center'>"+(product)+"</td><td class='price text-center'>"+price+"</td><td class='text-center'>"+unit+"</td><td class='qty text-center'>"+value+"</td><td class='totalPrice text-center'>"+total+"</td><td class='text-center p-1'><button class='btn btn-danger btn-sm' type='button' id='delete-row'><i class='fas fa-times-circle'></i></button><tr>");
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

$(document).on('click','.Enter',function(){

  var TotalPriceArr = $('#tableData tr .totalPrice').get();
   var typeofcash = $("input[name='typeofcash']:checked").val();

 /* if($.trim($('#customer_search').val()).length == 0){
      swal("Warning","Please Enter Customer Name!","warning");
      return false;
    }*/
   
    if(typeofcash == undefined){
      swal("Warning","Please Select The Type Of Cash !","warning");
      return false;
    }

  if (TotalPriceArr == 0){
    swal("Warning","No products ordered!","warning");
    return false; 
  }else{

    var product = [];
    var quantity = [];
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
     
   //alert(datee)
       
     $('.ccprice').each(function(){
     ccprice.push($(this).text());
    });

    $('.barcode').each(function(){
     product.push($(this).text());
    });
    $('.qty').each(function(){
    quantity.push($(this).text());
    });
    $('.price').each(function(){
      price.push($(this).text().replace(/,/g, "").replace("Ghc",""));
    });

    swal({
      title: "Enter Cash",
      content: "input",
    })
    .then((value) => {  
      if(value == "") {
        swal("Error","Entered None!","error");
      }else{

        var qtynum = value;
        if(isNaN(qtynum)){
          swal("Error","Please enter a valid number!","error");
        }else if(qtynum == null){
          swal("Error","Entered None!","error");
        }else{

          var change = 0;
          // var TotalPriceArr = $('#tableData tr .totalPrice').get()
          // $(TotalPriceArr).each(function(){
          //   TotalValue += parseFloat($(this).text().replace(/,/g, "").replace("₱",""));
          // });
          var grandtotal = parseFloat($('#totalValue').text().replace(/,/g, "").replace("Ghc",""));
          var TotalValue = parseFloat($('#totalValue1').text().replace(/,/g, "").replace("Ghc",""));


          if(grandtotal > qtynum){
            swal("Error","Can't process a smaller number","error");
          }else{
            change = parseFloat(value) - parseFloat(grandtotal);
            
            $.ajax({
              url:"insert_sales.php",
              method:"POST",
        data:{totalvalue:TotalValue, product:product, price:price, grandtotal:grandtotal, days:days, month:month, user:user, years:years, customer:customer, quantity:quantity, discount:discount, typeofcash:typeofcash, datee:datee, ccprice:ccprice},
              success: function(data){
              //alert(data)
                if(data){
                  swal({
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