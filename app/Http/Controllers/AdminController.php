<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\products;
use App\Models\customer;
use App\Models\sales;
use App\Models\sales_product;
class AdminController extends Controller
{
    //

    /*
 |-------------------------------------------
 |  Dashboard function Start From Here
 |------------------------------------------=
 */

    public function dashboard()
    {
        return view('admin.dashboard');
    }

/*
 |-------------------------------------------
 | Login page start from here
 |------------------------------------------=
 */
    public function Index(){
        return view('admin.login_admin');
    }

/*
 |-------------------------------------------
 |End of Login page
 |------------------------------------------=
 */




/*
 |-------------------------------------------
 | End of Dashboard Functions
 |------------------------------------------=
*/




/*
 |-------------------------------------------
 |loading customer to database
 |------------------------------------------=
*/
 public function loadcustomer(Request $request){
      $input = $request->input('query');   
    $customerlo = customer::where('FirstName','LIKE','%'.$input.'%')
    ->get();   
    $customerarray = array();     
       foreach($customerlo as $cust){
        $customerarray[] = $cust->FirstName;  
      

    }
   //  dd($customerarray);
    // return response()->json($customerarray);
     print json_encode($customerarray);

     //         foreach($customerlo as $cust)
     // $array[] =;

    // $show   = "SELECT * FROM customer WHERE firstnamec LIKE '%{$query}%'";
    // $result = mysqli_query($conn,$show);
    // $array  = array();

    //     while($row = mysqli_fetch_assoc($result)){
    //         $array[] =$row['firstnamec'].' '.$row['lastnamec'];             
    //     }
    //     print json_encode($array);


}















public function loadproductsearch(Request $request){
 $name = $request->products;
 if ($name == '') {

     exit;
 }else{


    $product = products::where('product_name','LIKE','%'.$name.'%')
                        ->where('quantity', '>', '0')
                        ->where('cprice', '>', '0')
                        ->where('sell_price', '>', '0')
                        ->Orwhere('product_id','LIKE','%'.$name.'%')
                        ->where('quantity', '>', '0')
                        ->where('cprice', '>', '0')
                        ->where('sell_price', '>', '0')
                        ->Orwhere('product_no','LIKE','%'.$name.'%')
                        ->where('quantity', '>', '0')
                        ->where('cprice', '>', '0')
                        ->where('sell_price', '>', '0')->get();

    $output = '';
    if($product->count() > 0 ){
    foreach($product as $prod){
               echo "<tr class='js-add' data-barcode=".$prod->product_id." data-product=".$prod->product_name." data-cprice=".$prod->cprice." data-price=".$prod->sell_price." data-unt=".$prod->unit." data-min=".$prod->min_stocks." data-quantity=".$prod->quantity.">";
               echo "<td class='text-center'>".$prod->product_id."</td>";
               echo "<td class='text-center'>".$prod->product_name."</td>";
               echo "<td class='text-center'>Ghc ".number_format($prod->sell_price,2)."</td>";
               echo "<td class='text-center'>".$prod->unit."</td>";
               echo "<td class='text-center'>".$prod->quantity."</td>";
               echo "<td class='text-center'>".$prod->expire_date."</td>";
               echo "<td class='text-center p-1'><button class='btn btn-danger btn-sm' type='button' id='delete-row'><i class='fas fa-times-mark'></i></button></td>";

    }
   // echo $output;
     }else{
        echo '<td></td><td><h6 class="text-center text-secondary my-5">No Products found!<br>
        Check Quantity!<br>
        Check Cost Price!<br>
        Check selling Price!<br>
        All can found from the stock table!<br>
         </h6></td><td></td>';
     }
     }
 }

 /*
 |-------------------------------------------
 | Saving customer order to database
 |------------------------------------------=
 */

 public function insert_sale(Request $request){

    $customername = $request->customer;
    if ($customername == '') {          
     exit;
        }else{

    $customer = customer::where('FirstName',$customername)->get();        //  dd($customer);      
        
     if($customer == false){
        exit;
    }else{
                foreach($customer as $cust){
                   $customer_id = $cust->id;                
                        $id = DB::table('sales')->insertGetId([
                          'customer_id' => $customer_id,
                        'username' => $request->user,
                        'discount' => $request->discount,
                        'total' => $request->Totalvalue,
                        'grandtotal' => $request->grandtotal,
                        'days' => $request->days,
                        'month' => $request->month,
                        'days' => $request->days,
                        'year' => $request->years,
                        'typeofcash' => $request->typeofcash
                        ]);
                          
                        }

                        $reciept = array();
                        for($i = 0;  $i < count($request->product); $i++){
                         $reciept[] = $id;
                            //dd($reciept);
                          }
                                  
                    //return response()->json(['status'=>1]);               
                         
                   
                    for($num=0; $num < count($request->product); $num++){
                       
                          $prod_id = $request->product[$num];
                          $qtyold = $request->quantities[$num];   

                // //from the for loop to find the each product from the table

                           $data = products::where('product_id',$prod_id)->get();
                          
                // //from the founding of each product to loop, from the foreach loop function
                            foreach ($data as $datase)
                                {
                                     $calc = (($datase->quantity) -  ($qtyold));
                                }
                                     $dataa = [
                                            'id' =>$datase->id,
                                             'product_id'=>$request->product[$num],
                                              'quantity'=>$calc,
                                             ];

                       $productupdate = products::upsert($dataa, ['id','product_id','quantity']);
                     }



            for($count = 0; $count < count($request->product); $count++){
               

                  $data3 = [
                    'reciept_no'=>$reciept[$count],
                    'product_id'=>$request->product[$count],                    
                    'price'=>$request->price[$count],
                    'ccprice'=>$request->ccprice[$count],
                    'qty'=>$request->quantities[$count],
                    //'created_date'=>$request->ccprice[$count],
                ];
               
               sales_product::upsert($data3, ['reciept_no','product_id','price','ccprice','qty']);

                }





                echo($id);
            }
          
 }
}




/*
 |-------------------------------------------
 | Login in function here
 |------------------------------------------=
 */
    public function Login(Request $request){

            // $checks = $request->all();

            // if(Auth::guard('admin')->attempt(['email' => $checks['email'],'password'=>$checks['password'] ])){
            //     return redirect()->route('admin.dashboard')->with('error','Admin Login Successfully');
            // }else{
            //     return back()->with('error','Invaild Email Or Password');
            // }


    }
/*
 |-------------------------------------------
 | End of Login function
 |------------------------------------------=
 */

 public function AdminLogout(){

     Auth::guard('role')->logout();
     return redirect()->route('login_form')->with('error','Admin Logout Successfully');

 }

/*
 |-------------------------------------------
 |Logout function start from here
 |------------------------------------------=
 */
















/*
 |-------------------------------------------
 |End of Logout function
 |------------------------------------------=
 */























}
