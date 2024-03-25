<style>
	

</style>

<!DOCTYPE html>
<html>
<head>
	 <title>{{ config('app.name','ea_soft') }} - @yield('Reciept') </title>
     <link  rel="shortcut icon" type="image/icon" href="{{ url('assets/Ea-Soft.ico') }}">
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="csrf-token" content="{{ csrf_token() }} " >

     <script src="/assets/js/jquery.min.js"></script>
      <script src="/assets/js/bootstrap.bundle.min.js"></script>
      <script src="/assets/js/sweetalert.min.js"></script>  
      <script src="/assets/js/script.js"></script>
       <script src="/assets/js/accounting.min.js"></script>
        <script src="/assets/js/typeahead.js"></script>

      <script src="/assets/js/jquery.datetimepicker.full.min.js"></script>
      <script src="/assets/js/select2.min.js"></script>
     
      <script src="/assets/js/datatables.min.js"></script>
      <script src="/assets/js/jquery.dataTables.min.js"></script>
      <script src="/assets/js/ddtf.js"></script>
 			<script src="/assets/js/datatables.min.js"></script>

      <script src="/assets/js/datepicker.js"></script>
      
    

    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/style.css') }}"> 

     <link rel="stylesheet" type="text/css" href="{{ url('assets/css/bootstrap.min.css') }}">

      <link rel="stylesheet" type="text/css" href="{{ url('assets/css/bootstrap.css') }}">

     <link rel="stylesheet" type="text/css" href="{{ url('assets/css/select2.min.css') }}">

     <link rel="stylesheet" type="text/css" href="{{ url('assets/css/main.css') }}">

   

      <link rel="stylesheet" type="text/css" href="{{ url('assets/css/datatables.min.css') }}">
     
      <link rel="stylesheet" type="text/css" href="{{ url('assets/css/datatables.css') }}">
      
      <link rel="stylesheet" type="text/css" href="{{ url('assets/css/dashboard.css') }}">
      
     
     


<style>
	.flex{
		display: inline-flex;
		width: 100%;
	}
	.w-50{
		width: 50%;
	}
	.text-center{
		text-align:center;
	}
	.text-right{
		text-align:right;
	}
	table.wborder{
		width: 100%;
		border-collapse: collapse;
	}
	table.wborder>tbody>tr, table.wborder>tbody>tr>td{
		border:1px solid;
	}
	p{
		margin:unset;
	}

</style>
</head>
<body>

 	<div class="page" size="A4">
	<div class="head">
		
		<p><h4 class="text-center head1">MARK PHONES SHOP</h4></p>
		<p><h5 class="text-center head1" style="margin: -25px;"><b>"A domestic and trusted  shop."</b></h5></p>
		<p><h6 class="text-center head1" style="margin: 1px;">ELUBO, OPPOSITE OF O.A STATION</h6></p>
		<p><h6 class="text-center head1" style="margin: -18px; ">CONTACT:0541021978, 0541022197)</h6></p>
		<br>
</div>
@foreach( $cust1 as $detail)
	
	<p class="text-left" style="margin-top: 0px; padding-left:10px;">Invoice #:<b></b><b>{{ $detail->reciept}}<b><b></b><b></b></p>
	<p class="text-left" style="margin-top: 0px; padding-left:10px;">Customers Name: <b>{{ $detail->cusname}}</p>
	<p class="text-left" style="margin-top: 3px; padding-left:10px;">Date: <b>{{ $detail->dates }}</b></p>
<p type="text" name="name" class="" id="id" value="{{ $id }}"></p>
	<br>


@endforeach



	<div class="table-responsive-sm">
				
	
				<table class="table table-striped">
					<thead>
					<tr>
						<!-- <th class="center" >#</th>-->
						<th class="text-center">Product</th>						
						<th class="text-center">Qty</th>	
						<th class="text-center">Subtotal</th>


						
						
						</tr>
					</thead>
					<tbody>
						@php 
							$subtotal = 0;
						@endphp
					
						@foreach($prods as $product)
					 @php 


					 	$qty = $product->quantity;
					 $subtotal = ($product->quantity*$product->prices );
              $name = $product->productname;
              $totalsales = $product->totals;	
              $discount = $product->totaldiscount;
               $grantotal = $product->grands;

            @endphp 
           <tr> 

          <td class="text-center">{{ $name }}</td>                  
			  	<td class="text-center">{{ number_format($qty,2) }}</td>
					<td class="text-center">{{ number_format($subtotal,5) }}</td>
			
				</tr>
					@endforeach
				</tbody>
				</table>
			</div>

			<div class="row total1">
				<div class="  ml-auto">
					<table class="table table-clear">
						<tbody>
							<tr>
								<td class="text-left">
							<strong class="text-dark">SubTotal</strong>
							</td>
							<th class='text-left text-primary '><b>Ghc: {{ number_format($totalsales,5)}}</b>
							</th>								
							</tr>
							
							<tr>
							<td class="text-left">
							<strong class="text-dark">Discount:</strong>
							</td>
							<th class='text-left text-primary '><b>Ghc: {{ number_format($discount,5)}}</b>
							</th>								
							</tr>

							<tr>
							<td class="text-left">
							<strong class="text-dark">GrandTotal:</strong>
							</td>
							<th class='text-left text-primary '><b>Ghc {{ number_format($grantotal,5)}}</b>
							</th>								
							</tr>

						</tbody>
					</table>					
				</div>					
			</div>
			<div class="footnote">
			<p class="text-center ">...............................................................................</p>	
			<p class="text-center">Thank You </p>
		    	<p class="text-center">For Buying From Us</p> <p class="easoft">Design By EASoft Contact:+233541021978</p>
			</div>

















 		</div>

<style>
	img#cimg{
		max-height: 100vh;
		max-width: 10vw;		
		position: relative;
	}
	img {
		padding-right: 30px;
	}
</style>

</body>



<script type="text/javascript">
	





</script>
</html>