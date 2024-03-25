<?php

namespace App\Http\Controllers;
use App\Models\sales;
use App\Models\sales_product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\products;
use App\Models\User;
use App\Models\cashtype;
use App\Models\customer;
class SaleController extends Controller
{
   



    public function show_salestatistic()
    {
        return view('admin.salestatistics');
    }


  public function fetchallsalestatistics()
    {
        $cust = DB::table('sales_products')
                    ->select(DB::raw('SUM(sales_products.price) as prices, SUM(sales_products.ccprice) as cprice, SUM(sales_products.qty) as quantity, sales_products.created_at, products.product_name, sales_products.product_id'))
                ->join('products', 'sales_products.product_id', '=', 'products.id')
                ->groupBy('sales_products.product_id','products.product_name','sales_products.created_at')
                ->orderBy('sales_products.created_at', 'desc')
                
                ->get();
        

        $output = '';
        $i = 1;
        $totalpr = 0;
        $totalco =0;
        $diffes = 0;
        if($cust->count() > 0 ){
            $output .='
            <table class="table table-striped table-sm text-center align-middle">
            <thead>
                <tr>
                 <th class="text-center">#</th>
                 <th class="">Product</th>
                 <th class="">Sprice</th>
                 <th class="">Cprice</th>
                 <th class="">Qty sold</th>
                 <th class="">CTotal</th>    
                 <th class="">STotal</th>  
                  
                 <th class="">Diff</th>  
                 <th class="">Date</th>
                </tr>
            </thead>
            <tbody>';
        foreach($cust as $cus){
            $tots = ($cus->prices*$cus->quantity);
            $ctotal = ($cus->cprice*$cus->quantity);
            $diffs = ($tots-$ctotal);

                $totalco += $ctotal;
                $totalpr += $tots;
                $diffes += $diffs;
            /*   $stotal = ($cus->price*$cus->qty);
              ;
             */
               //$ctotals += ($cus->ccprice*$cus->qty);




                    $output .= '<tr>
                     <td class="text-center">
                     '.$i++.'
                  </td>
                     <td>'.$cus->product_name.'</td>                
                    <td>'.$cus->prices.'</td> 
                    <td>'.$cus->cprice.'</td> 
                    <td>'.$cus->quantity.'</td> 
                    <td>'.number_format($ctotal,5).'</td>
                    <td>'.number_format($tots,5).'</td>
                     <td>'.number_format($diffs ,5).'</td>                    
                    <td>'.$cus->created_at.'</td> 
                    </tr>';
        }
        $output .='</tbody>
            <tfoot>
              <tr>
                
                 <th colspan="5" class="text-center">Total</th>
                  <th class="text-center text-danger">'.number_format($totalco,5).'</th>  
                 <th class="text-center text-success">'.number_format($totalpr,5).'</th>
                 <th class="text-center text-success">'.number_format($diffes,5).'</th>
                
                  
                    </tr>
            </tfoot>
        </table>
        </div>
        </div>
        </div>';
        echo $output;
        }else{

            echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
           

        }         
     }




public function search_salestatistics(Request $request)
    {
        /*date_format(sp.created_date,'%Y-%m-%d')*/

        $start_dat =$request->datefrom;
         $end_dat =$request->dateto; 
       // echo($start_dat);


        $cust = DB::table('sales_products')
                ->wherebetween('sales_products.created_at',[$start_dat." 00:00:00",$end_dat." 00:00:00"] )
                ->select(DB::raw('SUM(sales_products.price) as prices, SUM(sales_products.ccprice) as cprice, SUM(sales_products.qty) as quantity, sales_products.created_at, products.product_name, sales_products.product_id'))
                ->join('products', 'sales_products.product_id', '=', 'products.id')
                ->groupBy('sales_products.product_id','products.product_name','sales_products.created_at')
                ->orderBy('sales_products.created_at', 'desc')
                
                ->get();
        

        $output = '';
        $i = 1;
        $totalpr = 0;
        $totalco =0;
        $diffes = 0;
        if($cust->count() > 0 ){
            $output .='
            <table class="table table-striped table-sm text-center align-middle">
            <thead>
                <tr>
                 <th class="text-center">#</th>
                 <th class="">Product</th>
                 <th class="">Sprice</th>
                 <th class="">Cprice</th>
                 <th class="">Qty sold</th>
                 <th class="">CTotal</th>    
                 <th class="">STotal</th>  
                  
                 <th class="">Diff</th>  
                 <th class="">Date</th>
                </tr>
            </thead>
            <tbody>';
        foreach($cust as $cus){
            $tots = ($cus->prices*$cus->quantity);
            $ctotal = ($cus->cprice*$cus->quantity);
            $diffs = ($tots-$ctotal);

                $totalco += $ctotal;
                $totalpr += $tots;
                $diffes += $diffs;
             $output .= '<tr>
                     <td class="text-center">'.$i++.'</td>
                     <td>'.$cus->product_name.'</td>                
                    <td>'.$cus->prices.'</td> 
                    <td>'.$cus->cprice.'</td> 
                    <td>'.$cus->quantity.'</td> 
                    <td>'.number_format($ctotal,5).'</td>
                    <td>'.number_format($tots,5).'</td>
                     <td>'.number_format($diffs ,5).'</td>                    
                    <td>'.$cus->created_at.'</td> 
                    </tr>';
        }
        $output .='</tbody>
            <tfoot>
              <tr>
                
                 <th colspan="5" class="text-center">Total</th>
                  <th class="text-center text-danger">'.number_format($totalco,5).'</th>  
                 <th class="text-center text-success">'.number_format($totalpr,5).'</th>
                 <th class="text-center text-success">'.number_format($diffes,5).'</th>
                
                  
                    </tr>
            </tfoot>
        </table>
        </div>
        </div>
        </div>';
        echo $output;
        }else{

            echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
           

        }         
     }

// customer statistics

  public function show_cutomerstatistic()
    {
        return view('admin.customerstatistics');
    }


    public function fetchallcustomerstatistics()
    {
        $cust = DB::table('sales')
                ->select(DB::raw('SUM(sales.grandtotal) as grand, SUM(sales.total) as totals, SUM(sales.discount) as dis, (sales.created_date) as date, (users.name) as usern, (users.id) as id, (cashtypes.typeofcash) as cashtype '))
                ->join('users', 'sales.username', '=', 'users.id')
                ->join('cashtypes', 'sales.typeofcash', '=', 'cashtypes.id')
                ->groupBy('users.name','sales.created_date','users.id','cashtypes.typeofcash')            
                
                ->get();
     

        $output = '';
        $i = 1;
        $disc = 0;
        $total =0;
        $grands = 0;
        if($cust->count() > 0 ){
            $output .='
            <table class="table table-striped table-sm text-center align-middle">
            <thead>
                <tr>
                  <th class="text-center">#</th>
                    <th class="text-center">User name</th>
                    <th class="text-center">Discount.</th>
                    <th class="text-center">Total.</th>
                    <th class="text-center">Grandtotal</th>   
                    <th class="text-center">Cash Type</th>   

                    <th class="text-center">Date</th> 
                </tr>
            </thead>
            <tbody>';
        foreach($cust as $cus){
                $disc += $cus->dis;
                $total += $cus->totals;
                $grands += $cus->grand; 
            /*   $stotal = ($cus->price*$cus->qty);
              ;
             */
               //$ctotals += ($cus->ccprice*$cus->qty);



                    $output .= '<tr>
                     <td class="text-center">
                     '.$i++.'
                  </td>
                     <td >
                    <button class="btn btn-sm btn-outline-danger delete_supplier" data-id="'.$cus->id.'" type="button">'.$cus->usern.'</button>
                     </td>                
                    <td>'.$cus->dis.'</td>  
                    <td>'.$cus->totals.'</td>  
                    <td>'.$cus->grand.'</td>  
                    <td>'.$cus->cashtype.'</td>
                    <td>'.$cus->date.'</td>  

                    </tr>';
        }
        $output .='</tbody>
            <tfoot>
              <tr>
                
                 <th colspan="2" class="text-center">Total</th>
                  <th class="text-center text-danger">'.number_format($disc,5).'</th>  
                 <th class="text-center text-success">'.number_format($total,5).'</th>
                 <th class="text-center text-success">'.number_format($grands,5).'</th>
                
                  
                    </tr>
            </tfoot>
        </table>
        </div>
        </div>
        </div>';
        echo $output;
        }else{

            echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
           

        }         
     }




public function searchcustomerstatistics(Request $request)
    {
        /*date_format(sp.created_date,'%Y-%m-%d')*/
        $name = $request->username;
        $start_dat =$request->datefrom;
         $end_dat =$request->dateto;      


      // echo($name);


        $cust = DB::table('sales') 
                ->where('users.name','LIKE','%'.$name.'%')                
                ->wherebetween('sales.created_date',[$start_dat." 00:00:00",$end_dat." 00:00:00"] ) 

                ->select(DB::raw('SUM(sales.grandtotal) as grand, SUM(sales.total) as totals, SUM(sales.discount) as dis, (sales.created_date) as date, (users.name) as usern, (users.id) as id, (cashtypes.typeofcash) as cashtype '))
                ->join('users', 'sales.username', '=', 'users.id')
                 ->join('cashtypes', 'sales.typeofcash', '=', 'cashtypes.id')
                ->groupBy('users.name','sales.created_date','users.id','cashtypes.typeofcash')            
                
                ->get();
     

        $output = '';
        $i = 1;
        $disc = 0;
        $total =0;
        $grands = 0;
        if($cust->count() > 0 ){
            $output .='
            <table class="table table-striped table-sm text-center align-middle">
            <thead>
                <tr>
                  <th class="text-center">#</th>
                    <th class="text-center">User name</th>
                    <th class="text-center">Discount.</th>
                    <th class="text-center">Total.</th>
                    <th class="text-center">Grandtotal</th>   
                   <th class="text-center">Cash Type</th> 
                    <th class="text-center">Date</th> 
                </tr>
            </thead>
            <tbody>';
        foreach($cust as $cus){
                $disc += $cus->dis;
                $total += $cus->totals;
                $grands += $cus->grand; 
            /*   $stotal = ($cus->price*$cus->qty);
              ;
             */
               //$ctotals += ($cus->ccprice*$cus->qty);



                    $output .= '<tr>
                     <td class="text-center">
                     '.$i++.'
                  </td>
                     <td >
                    <button class="btn btn-sm btn-outline-danger delete_supplier"  data-id="'.$cus->id.'" type="button">'.$cus->usern.'</button>
                     </td>                
                    <td>'.$cus->dis.'</td>  
                    <td>'.$cus->totals.'</td>  
                    <td>'.$cus->grand.'</td>
                    <td>'.$cus->cashtype.'</td>   
                    <td>'.$cus->date.'</td>  

                    </tr>';
        }
        $output .='</tbody>
            <tfoot>
              <tr>
                
                 <th colspan="2" class="text-center">Total</th>
                  <th class="text-center text-danger">'.number_format($disc,5).'</th>  
                 <th class="text-center text-success">'.number_format($total,5).'</th>
                 <th class="text-center text-success">'.number_format($grands,5).'</th>
                
                  
                    </tr>
            </tfoot>
        </table>
        </div>
        </div>
        </div>';
        echo $output;
        }else{

            echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
           

        }         
     
        


     }



//Customer Details

  public function show_customerdetails(Request $request)
    {
     
        $id = $request->id;
        $cust = DB::table('sales')
                ->select(DB::raw('SUM(sales.grandtotal) as grand, (customers.FirstName) as cust, (sales.discount) as disc, (sales.reciept_no) as recieptid, SUM(sales.total) as totals, (created_date) as dates, (cashtypes.typeofcash) as cashtype'))
                ->where('username','=',$id)
                ->join('customers','sales.customer_id', '=', 'id')
                ->join('cashtypes', 'sales.typeofcash', '=', 'cashtypes.id')
                ->groupBy('sales.reciept_no','customers.FirstName','sales.discount','sales.created_date','cashtypes.typeofcash')
                ->orderBy('sales.created_date', 'desc' )
                ->get();
       
        return view('admin.customerdetails', ['cust'=>$cust]);
     
    }


    public function fetch_customerdetails(Request $request)
    {
                $ree = $request->id;
                echo($ree);
         $cust = DB::table('sales')
                ->select(DB::raw('SUM(sales.grandtotal) as grand, (sales.customer_id) as cust, (sales.discount) as disc, (sales.reciept_no) as id, SUM(sales.total) as totals, (created_date) as dates, (sales.typeofcash) as cashtype'))
                ->groupBy('sales.reciept_no','sales.customer_id','sales.discount','sales.created_date')// (sales.created_date) as dates, (sales.customer_id) as cust
                ->get();

        $output = '';
        $i = 1;
        $disc = 0;
        $total =0;
        $grands = 0;
        if($cust->count() > 0 ){
            $output .='
            <table class="table table-striped table-sm text-center align-middle">
            <thead>
                <tr>
                  <th class="text-center">#</th>
                    <th class="text-center">Customer name</th>
                    <th class="text-center">Discount.</th>
                    <th class="text-center">Total.</th>
                    <th class="text-center">Grandtotal</th>   
                    <th class="text-center">Date</th> 
                </tr>
            </thead>
            <tbody>';
        foreach($cust as $cus){
                /*$disc += $cus->dis;
                $total += $cus->totals;
                $grands += $cus->grand; */
            /*   $stotal = ($cus->price*$cus->qty);
              ;
             */ 
               //$ctotals += ($cus->ccprice*$cus->qty);



                    $output .= '<tr>
                     <td class="text-center">
                     '.$i++.'
                  </td>
                     <td>'.$cus->cust.'</td>                
                     <td>'.$cus->disc.'</td>
                     <td>'.$cus->totals.'</td>
                     <td>'.$cus->grand.'</td> 
                     <td>'.$cus->dates.'</td>   
                    </tr>';
        }
        $output .='</tbody>
            <tfoot>
              <tr>
                
                 <th colspan="2" class="text-center">Total</th>
                
                
                  
                    </tr>
            </tfoot>
        </table>
        </div>
        </div>
        </div>';
        echo $output;
        }else{

            echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
           

        }  
     }

//receipt print

 public function view_customers(Request $request)
    {

          $id = $request->recipid;
          
                
          $cust1= DB::table('sales')
                    ->select(DB::raw('(customers.FirstName) as cusname, (sales.reciept_no) as reciept, (sales.created_date) as dates'))                    
                    ->join('users','sales.username', '=', 'users.id')
                    ->join('customers','sales.customer_id','=','customers.id')
                    ->where('sales.reciept_no','=',$id)
                   ->get();
   

    $prods= DB::table('sales')
                    ->select(DB::raw('(sales_products.qty) as quantity, (sales_products.price) as prices, (products.product_name) as productname, (sales.total) as totals, (sales.discount) as totaldiscount, (sales.grandtotal) as grands'))                    
                    ->join('sales_products','sales.reciept_no', '=', 'sales_products.reciept_no')
                    ->join('products','sales_products.product_id','=','products.product_id')
                    ->where('sales.reciept_no','=',$id)
                   ->get();





              













        return view('admin.view_salerecode',compact('cust1','prods','id'));
    }




public function print_customers(Request $request)
    {



          $id = $request->recipid;
          
                
          $cust1= DB::table('sales')
                    ->select(DB::raw('(customers.FirstName) as cusname, (sales.reciept_no) as reciept, (sales.created_date) as dates'))                    
                    ->join('users','sales.username', '=', 'users.id')
                    ->join('customers','sales.customer_id','=','customers.id')
                    ->where('sales.reciept_no','=',$id)
                   ->get();
   

    $prods= DB::table('sales')
                    ->select(DB::raw('(sales_products.qty) as quantity, (sales_products.price) as prices, (products.product_name) as productname, (sales.total) as totals, (sales.discount) as totaldiscount, (sales.grandtotal) as grands'))                    
                    ->join('sales_products','sales.reciept_no', '=', 'sales_products.reciept_no')
                    ->join('products','sales_products.product_id','=','products.product_id')
                    ->where('sales.reciept_no','=',$id)
                   ->get();



        return view('admin.print_salercode',compact('cust1','prods','id'));
    }

}
