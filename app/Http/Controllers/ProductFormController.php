<?php

namespace App\Http\Controllers;

use App\Models\warehouses;
use App\Models\newstock;
use App\Models\products;
use Illuminate\Http\Request;

class ProductFormController extends Controller
{
    //


    //disply area
    public function productForm(){
        return view('admin.product_form');
    }


 //fetchall Product Forms data to table
 public function fetchalProductForm()
 {
     $ware = warehouses::all();
     $output = '';
     if($ware->count() > 0 ){
         $output .='
         <table  id="mytable" class="table1 table-striped w-100  font-weight-bold tablet " style="cursor: pointer;" >

         <thead>
         <tr class="text-center text-black"><b>
                 <th class="text-center" id="checkbox1">
                 
                 </th>
                 <th class="text-center">ID</th>
                 <th class="text-center">Product</th>
                 <th class="text-center">Price</th>
                 <th class="text-center">Qty</th>
                 <th class="text-center">Unit</th>
                 <thclass="text-center" style="display:none;">Description</th>
                <th class="text-center" style="display:none;">Expirdate</th>
                <th class="text-center" style="display:none;">Sub.Total</th>
                <th class="text-center" style="display:none;">barc</th>
                 
             </b></tr>
         </thead>
         <tbody>';
     foreach($ware as $wares){
                 $output .= '<tr>
                 <td class="text-center" id="checkbox1">
                <input class="checkbox" type="checkbox" name="check" id="num1" value="">
                </td>
                 <td class="text-center" >'.$wares->sid.'</td>
                 <td class="text-center" >'.$wares->name.'</>
                 <td class="text-center" >'.$wares->price.'</td>
                 <td class="text-center" >'.$wares->quantity.'</td>
                 <td class="text-center" >'.$wares->unit.'</td>
                 <td class="class="text-center" name="check" style="display:none;">'.$wares->description.'</td>

                <td class="text-center" name="check" style="display:none;">'.$wares->expir_date.'</td>
                <td class="text-center " name="check"style="display:none;">'.$wares->supplier_id.'</td>
                <td class="text-center" name="check"style="display:none;">'.$wares->multtotal.'</td>
               
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

//inserting of data to stores

   public function productforminsert(Request $request){
 if ($request->product == '') {
    return ('select a product');
     exit;
 }else{
    /*
    |'''''''''''''''''''''''''|
    |  for Warehouse          |
    |'''''''''''''''''''''''''|
    */
 //from the ajax to the for loop function
    var_dump($request->product);
    for($x=0; $x < count($request->product); $x++){
        $sid = $request->sid[$x];
        $quantity1 = $request->quantity1[$x];


//from the for loop to find the each product from the table

        $data = warehouses::where('sid',$sid)->get();

//from the founding of each product to loop, from the foreach loop function
    foreach ($data as $datase)
        {
            $calc = (($datase->quantity) -  ($quantity1));

        }

       $data = [
        'sid' =>$request->sid[$x],
        'name'=>$request->product[$x],
        'quantity'=>$calc,
            ];

        $test = warehouses::upsert($data, ['sid','name','quantity']);

        // var_dump($test);
    }
  /*
    |'''''''''''''''''''''''''|
    |  for product            |
    |'''''''''''''''''''''''''|
    */

    //from the ajax to the for loop function
    for($x=0; $x < count($request->sid); $x++){
        $sid = $request->sid[$x];
        $quantity1 = $request->quantity1[$x];
        

//from the for loop to find the each product from the table

        $data = products::where('product_id',$sid)->get();

//from the founding of each product to loop, from the foreach loop function

    //$data2 = ;


    foreach ($data as $data2)
        {
          //  var_dump($data);
            $calc2 = (($data2->quantity) +  ($quantity1));

        }

          //  var_dump($calc);

       $data3 = [
        'id' =>$data2->id,
        'product_id' =>$request->sid[$x],
        'product_name'=>$request->product[$x],
        'quantity'=>$calc2,
        'sell_price'=>$request->sprice[$x],
        'cprice'=>$request->cprice[$x],
        'unit'=>$request->unit1[$x],
        'min_stocks'=>$request->min_stock[$x],
        // 'expire_date'=>$request->expiredate[$x],
        // 'remarks'=>$request->description[$x],
            ];

        products::upsert($data3, ['id','product_id','product_name','quantity','sell_price','cprice']);//,'unit','min_stocks','expire_date','remarks'


    }


    /*
    |'''''''''''''''''''''''''''''|
    |  Save to the newstore table |
    |'''''''''''''''''''''''''''''|
    */

    //from the ajax to the for loop function
    for($y=0; $y < count($request->sid); $y++){
            $price1 = $request->cprice[$y];
            $quantity1 = $request->quantity1[$y];
            $totalcost1=(($quantity1)*($price1));

       $data4 = [
        'productID'=>$request->sid[$y],
        'product_no'=>$request->barcode[$y],
        'product_name'=>$request->product[$y],
        'sell_price'=>$request->sprice[$y],
        'cprice'=>$price1,
        'tcost'=>$totalcost1,
        'quantity'=>$quantity1 ,
         'unit'=>$request->unit1[$y],
         'min_stocks'=>$request->min_stock[$y],
         'remarks'=>$request->description[$y],
         'supplier_id'=>$request->supplierid[$y],
        // 'images'=>$request->images[$y],
         // 'date_create'=>$request->expiredate[$y],
                ];




            newstock::upsert($data4, ['productID','product_no','product_name','sell_price','cprice','quantity','unit','min_stocks','remarks','supplier_id']);// ,'product_no','product_name','sell_price','cprice','quantity','unit','min_stocks','remarks','supplier_id','images','date_create'
           // dd(newstock::upsert($data4, ['id','productID']);

     //dd($data4);
    }



}
}

// newstock showing and  information

 public function shownewstock(){
        return view('admin.newstock');
    }

// newstock fetch information
public function fetch_newstock()
 {
     $ware = newstock::all();
     $output = '';
     if($ware->count() > 0 ){
         $output .='
         <table  class="table1 table-bordered" id="report-list">

         <thead>
         <tr class="text-center text-black"><b>
                 <th class="text-center">#</th>
                 <th class="">Barcode</th>
                 <th class="">CompanyName</th> 
                 <th class="">Product Name</th>                            
                 <th class="">Quantity</th>   
                 <th class="">Unit</th> 
                 <th class="">Cost Price</th>
                 <th class="">Total Cost</th>
                 <th class="">Remarks</th>  
                 <th class="">Date Created</th>                            
                 <th class="">Dalete</th>
             </b></tr>
         </thead>
         <tbody>';
         $i = 1;
         $tcost1 = 0;
          $tcos =0;
     foreach($ware as $wares){
                 $tcos += $wares->cprice;

                $tcost1 += $wares->tcost;
                 $output .= '<tr>    
                    <td class="text-center">'.$i++.'</td>             
                
                 <td class="text-center" name="check">'.$wares->product_no.'</>
                 <td class="text-center" name="check">'.$wares->suppliersid->CompanyName.'</td>
                 <td class="text-center" name="check">'.$wares->product_name.'</td>
                 <td class="text-center" name="check">'.$wares->quantity.'</td>
                 <td class="text-center" name="check">'.$wares->unit.'</td>
                 <td class="text-center" name="check">'.$wares->cprice.'</td>
                 <td class="text-center" name="check">'.$wares->tcost.'</td>
                  <td class="text-center" name="check">'.$wares->remarks.'</td>
                <td class="text-center" name="check">'.$wares->created_at.'</td>
                 
                <td class="text-center">                     
 
                <button class="btn btn-sm btn-outline-danger delete_newstock" type="button" data-id="'.$wares->id.'"                                       
                     >Delete</button>
 
                    
                     </td>
                 </tr>';
     }
     $output .='</tbody>
            <tfoot>
              <tr>
                <th colspan="6" class="text-center">Total</th>  
                 <th class="text-right text-danger">'.number_format($tcos,5).'</th>
                  <th class="text-right text-danger">'.number_format($tcost1,5).'</th>
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


// newstock search information
public function search_newstocks(Request $request){
 $name = $request->products;


 if($request->products == ''){     
   return response()->json(['status'=>0]);
   exit;
    }else{

    $wareh = newstock::where('created_at','LIKE','%'.$name.'%')
                            ->Orwhere('quantity','LIKE','%'.$name.'%')
                            ->Orwhere('product_name','LIKE','%'.$name.'%')->get();

    $output = '';
    if($wareh->count() > 0 ){
         $output .='
         <table  class="table table-bordered" id="report-list">

         <thead>
         <tr class="text-center text-black"><b>
                  <th class="text-center">#</th>
                 <th class="">Barcode</th>
                 <th class="">CompanyName</th> 
                 <th class="">Product Name</th>                            
                 <th class="">Quantity</th>   
                 <th class="">Unit</th> 
                 <th class="">Cost Price</th>
                 <th class="">Total Cost</th>
                 <th class="">Remarks</th>  
                 <th class="">Date Created</th>                            
                 <th class="">Dalete</th>
             </b></tr>
         </thead>
         <tbody>';
         $i = 1;
         $tcost1 = 0;
          $tcos =0;
     foreach($wareh as $wares){
                 $tcos += $wares->cprice;
                $tcost1 += $wares->tcost;
                 $output .= '<tr>    
                    <td class="text-center">'.$i++.'</td>  

                 <td class="text-center" name="check">'.$wares->product_no.'</>
                 <td class="text-center" name="check">'.$wares->suppliersid->CompanyName.'</td>
                 <td class="text-center" name="check">'.$wares->product_name.'</td>
                 <td class="text-center" name="check">'.$wares->quantity.'</td>
                 <td class="text-center" name="check">'.$wares->unit.'</td>
                 <td class="text-center" name="check">'.$wares->cprice.'</td>
                 <td class="text-center" name="check">'.$wares->tcost.'</td>
                  <td class="text-center" name="check">'.$wares->remarks.'</td>
                <td class="text-center" name="check">'.$wares->created_at.'</td>
                 
                <td class="text-center">                     
 
                <button class="btn btn-sm btn-outline-danger delete_newstock" type="button" data-id="'.$wares->id.'"                                       
                     >Delete</button>
 
                    
                     </td>
                 </tr>';
     }
     $output .='</tbody>
            <tfoot>
              <tr>
                <th colspan="6" class="text-center">Total</th>  
                 <th class="text-right text-danger">'.number_format($tcos,5).'</th>
                  <th class="text-right text-danger">'.number_format($tcost1,5).'</th>
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


// delete newstocking 
public function delet_newstock(Request $request){            
            $id = $request->id;
          newstock::destroy($id);                      
    
                   
         return response()->json(['status'=>'success',]);
    
         }


























}
