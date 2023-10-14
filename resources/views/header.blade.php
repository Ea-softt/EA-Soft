<nav class=" align-items-stretch  border-dark sticky-top  bd-header d-flex  navbar navbar-expand-md navbar-dark bg-dark" aria-label="Fifth navbar example" style="font-size: 15px; padding: 10px;">



    <div class="container-fluid">
      <a class="navbar-brand text-success " style="font-size: 25px;" href="#">EA-Soft</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>     


      <div class="collapse navbar-collapse " id="navbarsExample05">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item " style="width: 80px;">
            <a class="nav-link active" aria-current="page" href="{{ route('pos.home') }}">Home</a>
          </li>         
          <!-- <li class="nav-item" style="width: 65px;">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
          </li> -->
          <li class="nav-item dropdown  text-success" style="width: 90px;">
            <a class="nav-link  " href="" id="dropdown05" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-user-friends"></i> User</a> <!--dropdown-toggle-->
            <ul class="dropdown-menu bg-dark text-white" aria-labelledby="dropdown05">
              <li><a class="dropdown-item text-success" href="{{ route('employee.show') }}"> Employees</a></li>
                           
             
                
            </ul>
          </li>

         

           <li class="nav-item dropdown text-success" style="width: 120px;">
            <a class="nav-link"  aria-current="page" href="{{ route('show.customer') }}" id="dropdown05" ><i class="fas fa-users"></i> Customer</a>
            
          </li>



<!-- 
           <li class="nav-item dropdown text-success" style="width: 80px;">
            <a class="nav-link " href="#" id="dropdown05" data-toggle="dropdown" aria-expanded="false">Customer</a>
            <ul class="dropdown-menu bg-dark" aria-labelledby="dropdown05">
              <li><a class="dropdown-item text-success" href="try.php">New Employee</a></li>
              <li><a class="dropdown-item text-success" href="">Details</a></li>
              <li><a class="dropdown-item text-success" href="">Statistics</a></li>
              <li><a class="dropdown-item text-success" href="">Payment List</a></li>
            </ul>
          </li> -->




           <!--  <li class="nav-item " style="width: 50px;">
            <a class="nav-link active" aria-current="page" href="mainpa.php">Home</a>
          </li>  -->



          <li class="nav-item dropdown text-success" style="width: 120px;">
            <a class="nav-link " href="" id="dropdown05" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-truck"></i> Supplier </a>
            <ul class="dropdown-menu bg-dark" aria-labelledby="dropdown05">
             <li><a class="dropdown-item text-success" href="supplierslist.php">Suppliers List</a></li>
              <li><a class="dropdown-item text-success" href="SupplierDeliverlist.php">Supplier Deliver</a></li> 
              <!--  <li><a class="dropdown-item text-success" href="Payment_supplierpayment.php">Payment</a></li>  
              <li><a class="dropdown-item text-success" href="Payment_list.php">List of Payment</a></li> --> 
              <li><a class="dropdown-item text-success" href="overalltotalpayment.php">Total Payment</a></li> 
            </ul>
          </li>  

        

           <li class="nav-item dropdown text-success" style="width: 125px;">
             <a class="nav-link " href="" id="dropdown05" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-building"></i> Warehouse </a>

             <ul class="dropdown-menu bg-dark" aria-labelledby="dropdown05">             
               <li><a class="dropdown-item text-success" href="warehouse.php">Warehouse Entry </a></li>   
               <li><a class="dropdown-item text-success" href="newwarehouse.php">Warehouse Update</a></li>  
               <li><a class="dropdown-item text-success" href="warehouseupdateload.php">Product Received</a></li> 
                <li><a class="dropdown-item text-success" href="warehouseexpiringdate.php">Expiring Date</a></li>          
                </ul>
                       
          </li>




          <li class="nav-item dropdown text-success" style="width: 90px;">
             <a class="nav-link " href="" id="dropdown05" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-shopping-cart"></i> Stock </a>

             <ul class="dropdown-menu bg-dark" aria-labelledby="dropdown05">             
               <li><a class="dropdown-item text-success" href="product.php">Market Stock</a></li>   
               <li><a class="dropdown-item text-success" href="newstock.php">Loaded Stock</a></li>  
               <li><a class="dropdown-item text-success" href="prodstatist.php">Product Stat</a></li>          
                </ul>
                       
          </li>

         

          <li class="nav-item dropdown text-success" style="width: 90px;">
            <a class="nav-link " href="" id="dropdown05" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-shopping-bag"></i> Sale </a>
            <ul class="dropdown-menu bg-dark" aria-labelledby="dropdown05">
             <li><a class="dropdown-item text-success" href="salerecode.php">Sale C</a></li>
              <li><a class="dropdown-item text-success" href="
                ">Sale statistics</a></li>
               <li><a class="dropdown-item text-success" href="saleusertwo.php">Daily Sale</a></li>     
               <li><a class="dropdown-item text-success" href="saleusermonth.php">Monthly Sale</a></li>   
               <li><a class="dropdown-item text-success" href="e_cash_inf.php">Daily Cash Type</a></li>    
               <li><a class="dropdown-item text-success" href="cashtypemonth.php">Monthly Cash Type Sale</a></li>    
                </ul>
          </li> 


          <!--  <li class="nav-item dropdown text-success" style="width: 90px;">
            <a class="nav-link " href="#" id="dropdown05" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-money-bill-wave"></i> Cash</a> 
            <ul class="dropdown-menu bg-dark" aria-labelledby="dropdown05">
              <li><a class="dropdown-item text-success" href="moneyin.php">Money In</a></li>
              <li><a class="dropdown-item text-success" href="moneyout.php">Money Out</a></li>
              <li><a class="dropdown-item text-success" href="expenditure_stat.php">statistics</a></li>
            </ul>
          </li> -->

           <li class="nav-item dropdown text-success" style="width: 90px;">
            <a class="nav-link"  aria-current="page"  href="generatorbar.php" id="dropdown05"><i class="fas fa-barcode"></i> Bar</a>           
          </li>




        </ul>                       
        

          <div class="d-flex flex-row-reverse flex-shrink-5 dropdown " style="margin-left:10px;">
        <a href="#" class="d-block link-secondary text-decoration-none text-success dropdown-toggle" id="dropdownUser2" data-toggle="dropdown" aria-expanded="false" style="margin-left: 70px; ">
          <img src="<?php echo isset($meta['picture']) ? '../img/'.$meta['picture'] :'' ?>" alt="mdo" width="32" height="32" class="rounded-circle">
        </a>
        <ul class="dropdown-menu text-small shadow " aria-labelledby="dropdownUser2">
          <li><a class="dropdown-item" href="newuser.php">Users</a></li>        
          <li><hr class="dropdown-divider"></li>
         <li><a class="dropdown-item" href="note.php">Note</a></li>
         <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="backupandrestore.php">Backup and Restore</a></li>          
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
        </ul>
      </div>

      </div>
    </div>
     </nav> 

     
<div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">      
    <div class=" text-success"><b>Welcome to EA-Soft School System</b></div>
    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
            </div>
    <div class="toast-body">
    <div class=" text-success"><b>Please try to draw your problem to EA-Soft and You Idea are Welcome Contact EA-Soft on +233541021978</b></div>    
    </div>
  </div>

  
   <!--
  
  
  <div class="toast"  role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-body text-white"  >
      </div>
    </div>
   -->
    <div id="preloader"></div>
    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
  
  {{-- <div class="modal fade" id="confirm_modal" role='dialog'>
      <div class="modal-dialog modal-ms" role="document">
        <div class="modal-content">
          <div class="modal-header bg-success">
          <h5 class="modal-title">Confirmation</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
  
        </div>
        <div class="modal-body">
          <div id="delete_content"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id='confirm' onclick="">Continue</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="uni_modal" role='dialog'>
  
      <div class="modal-dialog modal-lg" role="document">      
        <div class="modal-content">
          <div class="modal-header bg-success">           
          <h5 class="modal-title text-white"></h5>
          <button type="button" class="btn-danger btnn"  data-dismiss="modal" aria-label="Close"><span class="fa fa-times"></span></button> <i class=""> 
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer btnn">
          <button type="button" class="btn btnn btn-primary" id='submit' onclick="$('#uni_modal form').submit()"><i class="fas fa-thumbs-up">&nbsp&nbsp</i>Save</button>
          <button type="button" class="btn btnn btn-danger" data-dismiss="modal"><i class="fas fa-ban">&nbsp&nbsp</i>Cancel</button>
        </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="viewer_modal" role='dialog'>
      <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
          <div class="modal-header bg-success">
                <button type="button" class="btn-close" data-dismiss="modal"><span class="fa fa-times"></span></button>
                <img src="" alt="">
          </div>
        </div>
      </div>
    </div> --}}