<?php

namespace App\Http\Controllers;
use App\Models\products;
use Illuminate\Http\Request;
use App\Models\warehouses;


class ProductsController extends Controller
{
    //

    public function displyProduct(){
        return view('admin.product');      
    }


    public function stockfetch(){

        $cust = products::all();
        $output = '';
        if($cust->count() > 0 ){
            $output .='
            <table class="table table-striped table-sm text-center align-middle">
            <thead>
                <tr>
            <th >ID</th>
            <th >Prod Name</th>
            <th >Cost_Price</th>
            <th >Sell_Price</th>
            <th >Quantity</th>
            <th >Unit</th>
            <th >Min_Stocks</th>
            <th >Remarks</th>
            <th >Action</th>
                </tr>
            </thead>
            <tbody>';
        foreach($cust as $cus){
                    $output .= '<tr>
                    <td class="product_no text-center" data-product_no="'.$cus->product_id.'" >'.$cus->product_id.'</td>
                    <td class="product_name text-center" data-product_name="'.$cus->product_id.'" >'.$cus->product_name.'</>
                  

                    <td class="cprice text-center" data-cprice="'.$cus->product_id.'"  contenteditable>'.$cus->cprice.'</td>


                    <td class="sell_price text-center" data-sell_price="'.$cus->product_id.'"  contenteditable>'.$cus->sell_price.'</td>
                   

                    <td class="quantity text-center" data-quantity="'.$cus->product_id.'"  contenteditable>'.$cus->quantity.'</td>
                   


                    <td class="unit text-center" data-unit="'.$cus->product_id.'"  contenteditable>'.$cus->unit.'</td>
                    

                    <td class="min_stocks text-center" data-min_stocks="'.$cus->product_id.'" contenteditable>'.$cus->min_stocks.'</td>
                   
                    <td class="remarks text-center" data-remarks="'.$cus->product_id.'" contenteditable>'.$cus->remarks.'</td>
                    <td>


        <button name="btn delete" id="btn_delete" class="btn btn-xs btn-danger btn_delete" data-delete="'.$cus->id.'" >x</button>









                    </td>
                    </tr>';
        }
        $output .='</tbody>
        </table>
        </div>
        </div>
        </div>';
        echo $output;
        }else{

            echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';


        }
     }
//     $pos =$_POST['product_no'];


// $sql = "DELETE FROM products WHERE productID ='$pos'";
// if (mysqli_query($conn, $sql)){
//     $sql = "DELETE FROM warehouse WHERE  sid= '".$_POST['product_no']."'";
//     mysqli_query($conn, $sql);


//     echo 'Data delete';
// }


         /*public function deleteStock(Request $request){
            $id = $request->product_no;
           dd($id);

           //customer::destroy($id);


         return response()->json([
            'status'=>'success',
         ]);

         }*/









public function productedits(Request $request){
$productID = $request->productID;
$text = $request->text;
$col = $request->column_name;


 $data = products::where('product_id',$productID)->get();

 foreach($data as $datas)
 {
   $id = $datas->id;
 }
 

    $dataa = [
        'id' =>$id,
         $col=>$text,         
        ];

$test = products::upsert($dataa, ['id',$col]);



if($test != ''){
  return 1;
   // echo('1');
};

}




public function delet_prods(Request $request){            
            $id = $request->id;

             $data = products::where('product_id',$id)->get();

             foreach($data as $datas)
             {
               $name = $datas->product_name;
             }

           products::destroy($id);                      
            warehouses::destroy($id); 

            
                return response()->json(['status'=>$name, 'stat'=>'success'],);   
         //return response()->json(['stat'=>'success',]);
    
         }

















  public function showproductstat(){
        return view('admin.productstatis');
    }



public function fetch_productstat()
 {
     $ware = products::all();
     $output = '';
     if($ware->count() > 0 ){
         $output .='
         <table  class="table1 table-bordered" id="report-list">

         <thead>
         <tr class="text-center text-black"><b>
                <th class="text-center">#</th>
                <th class="text-center">Product</th>
                <th class="text-center">Cprice</th>
                <th class="text-center">Sprice</th>
                <th class="text-center">Quantity</th>
                <th class="text-center">CTotal</th>
                <th class="text-center">STotal</th>
                <th class="text-center">Difference</th>                                                          
             </b></tr>
         </thead>
         <tbody>';
         $i = 1;
         $tcost1 = 0;
          $tcos =0;
          $diffe =0;
     foreach($ware as $wares){
                $cprices = $wares->cprice;
                 $sell_prices = $wares->sell_price;
                 $qty = $wares->quantity;
                 $ctotal = ($cprices * $qty);
                 
                 $stotal = ($sell_prices * $qty);
                 $diff = (($stotal)-($ctotal));
               
               $tcos += $ctotal;
                $tcost1 += $stotal;
                $diffe += $diff;
                 $output .= '<tr>    
                    <td class="text-center">'.$i++.'</td>             
                
                 <td class="text-center" name="check">'.$wares->product_name.'</>
                 <td class="text-center" name="check">'.number_format($cprices,5).'</td>
                 <td class="text-center" name="check">'.number_format($sell_prices,5).'</td>
                 <td class="text-center" name="check">'.$qty.'</td>
                 <td class="text-center" name="check">'.number_format($ctotal,5).'</td>
                 <td class="text-center" name="check">'.number_format($stotal,5).'</td>
                 <td class="text-center" name="check">'.number_format($diff,5).'</td>
                
                 </tr>';
     }
     $output .='</tbody>
            <tfoot>
              <tr>
                <th colspan="5" class="text-center">Total</th>  
                <th class="text-right text-danger">'.number_format($tcos,5).'</th>
                 <th class="text-right text-success">'.number_format($tcost1,5).'</th>
                  <th class="text-right text-success">'.number_format($diffe,5).'</th>
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

/*
*/
//

public function fetchsearch_productstat(Request $request){
 $name = $request->products;


 if($request->products == ''){     
   return response()->json(['status'=>0]);
   exit;
    }else{

    $wareh = products::where('product_name','LIKE','%'.$name.'%')
                            ->Orwhere('quantity','LIKE','%'.$name.'%')
                            ->Orwhere('created_at','LIKE','%'.$name.'%')->get();

    $output = '';
    if($wareh->count() > 0 ){
         $output .='
         <table  class="table table-bordered" id="report-list">

         <thead>
         <tr class="text-center text-black"><b>
                  <th class="text-center">#</th>
                <th class="text-center">Product</th>
                <th class="text-center">Cprice</th>
                <th class="text-center">Sprice</th>
                <th class="text-center">Quantity</th>
                <th class="text-center">CTotal</th>
                <th class="text-center">STotal</th>
                <th class="text-center">Difference</th>
                
             </b></tr>
         </thead>
         <tbody>';
         $i = 1;
         $tcost1 = 0;
          $tcos =0;
          $diffe =0;
     foreach($wareh as $wares){
                $cprices = $wares->cprice;
                 $sell_prices = $wares->sell_price;
                 $qty = $wares->quantity;
                 $ctotal = ($cprices * $qty);
                 
                 $stotal = ($sell_prices * $qty);
                 $diff = (($stotal)-($ctotal));
               
               $tcos += $ctotal;
                $tcost1 += $stotal;
                $diffe += $diff;
                 $output .= '<tr>    
                    <td class="text-center">'.$i++.'</td>             
                
                 <td class="text-center" name="check">'.$wares->product_name.'</>
                 <td class="text-center" name="check">'.number_format($cprices,5).'</td>
                 <td class="text-center" name="check">'.number_format($sell_prices,5).'</td>
                 <td class="text-center" name="check">'.$qty.'</td>
                 <td class="text-center" name="check">'.number_format($ctotal,5).'</td>
                 <td class="text-center" name="check">'.number_format($stotal,5).'</td>
                 <td class="text-center" name="check">'.number_format($diff,5).'</td>
                                  
              
                 </tr>';
     }
     $output .='</tbody>
            <tfoot>
              <tr>                 
                  <th colspan="5" class="text-center">Total</th>  
                <th class="text-right text-danger">'.number_format($tcos,5).'</th>
                 <th class="text-right text-success">'.number_format($tcost1,5).'</th>
                  <th class="text-right text-success">'.number_format($diffe,5).'</th>
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
 }


















}