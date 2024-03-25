<?php

namespace App\Http\Controllers;
use App\Models\suppliers;
use App\Models\warehouses;
use App\Models\products;
use App\Models\updatewarehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{

//warehouse new load
    public function warehousenewload(){
        $warehouses = warehouses::all();
        return view('admin.warehouseNewload',compact('warehouses'));
    }

    public function fetchwarehousenewload()
 {
     $ware = warehouses::all();
     $output = '';
     if($ware->count() > 0 ){
         $output .='
         <table  id="mytable" class="table1 table-striped w-100  font-weight-bold tablet " style="cursor: pointer;" >

         <thead>
         <tr class="text-center text-black"><b>
                 <th class="text-center" id="checkbox1">
                 <input class="checkbox"  type="checkbox"  id="selectall">
                 </th>
                 <th class="text-center">ID</th>
                 <th class="text-center">Product</th>
                 <th class="text-center">Price</th>
                 <th class="text-center">Qty</th>
                 <th class="text-center">Unit</th>
                 <th class="text-center" style="display:none;">Description</th>
                <th class="text-center" style="display:none;">Expirdate</th>
                <th class="text-center" style="display:none;">barc</th>
                <th class="text-center" style="display:none;">Total Cost</th>
             </b></tr>
         </thead>
         <tbody>';
     foreach($ware as $wares){
                 $output .= '<tr>
                 <td class="text-center" id="checkbox1">
                <input class="checkbox" type="checkbox" name="check" id="num1" value="">
                </td>
                 <td class="text-center" name="check">'.$wares->sid.'</td>
                 <td class="text-center" name="check">'.$wares->name.'</>
                 <td class="text-center" name="check">'.$wares->price.'</td>
                 <td class="text-center" name="check">'.$wares->quantity.'</td>
                 <td class="text-center" name="check">'.$wares->unit.'</td>
                 <td class="text-center" name="check" style="display:none;">'.$wares->description.'</td>

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

//load warehouse update new to table

public function show_warehouseupdateloadnew(){
    return view('admin.warehouseupdateloadnew');

     /*$i = 1;
       $tcost1 = '0';
                       $tcos = '0';

                        $payments = $conn->query("SELECT *, (cprice * Quantity) as tcost FROM newstock ns inner join supplier sp on ns.supplier_id = sp.supplier_id  where date_format(date_created,'%Y-%m-%d') = '$month' order by unix_timestamp(date_created) desc");

                      $payments = $conn->query("SELECT *,sp.companyname as companyname1, (uw.quantity * uw.price) as tcot FROM updatewarehouse uw inner join supplier sp on uw.Companyname = sp.supplier_id where date_format(created_date,'%Y-%m-%d') = '$month' order by unix_timestamp(created_date) desc");
                     
                while($row = $payments->fetch_assoc()):
                        $tcos += $row['tcot'];
                      $month1 = $row['expiredate'];
                
                       $tcost1 += $row['price'];*/
                      
  }


public function fetch_warehouseupdateloadnew()
 {
     $ware = updatewarehouse::all();
     $output = '';
     if($ware->count() > 0 ){
         $output .='
         <table  class="table table-bordered" id="report-list">

         <thead>
         <tr class="text-center text-black"><b>
                 <th class="text-center">#</th>
                <th class="">ID</th> 
                 <th class="">Companyname</th>                          
                  <th class="">Product Name</th>   
                  <th class="">Quantity</th>                          
                  <th class="">Cost</th>   
                  <th class="">Tcost</th> 
                  <th class="">Unit</th>
                   <th class="">Description</th>
                  <th class="">Created Date</th>        
                  <th class="">Delete</th> 
             </b></tr>
         </thead>
         <tbody>';
         $i = 1;
         $tcost1 = 0;
          $tcos =0;
     foreach($ware as $wares){
                 $tcos += $wares->price;
                $tcost1 += $wares->tprice;
                 $output .= '<tr>    
                    <td class="text-center">'.$i++.'</td>             
                 <td class="text-center" name="check">'.$wares->id.'</td>
                 <td class="text-center" name="check">'.$wares->suppliersid->CompanyName.'</>
                 <td class="text-center" name="check">'.$wares->productname.'</td>
                 <td class="text-center" name="check">'.$wares->quantity.'</td>
                 <td class="text-center" name="check">'.$wares->price.'</td>
                 <td class="text-center" name="check">'.$wares->tprice.'</td>
                 <td class="text-center" name="check">'.$wares->unity.'</td>
                 <td class="text-center" name="check">'.$wares->description.'</td>
                <td class="text-center" name="check">'.$wares->created_at.'</td>
                 
                <td class="text-center">                     
 
                <button class="btn btn-sm btn-outline-danger delete_warehouseupdateload" type="button" data-id="'.$wares->id.'"                                       
                     >Delete</button>
 
                    
                     </td>
                 </tr>';
     }
     $output .='</tbody>
            <tfoot>
              <tr>
                <th colspan="5" class="text-center">Total</th>  
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


//warehouse update search by using month
public function warehouseupdateloadnewsearch(Request $request){
 $name = $request->products;


 if($request->products == ''){     
   return response()->json(['status'=>0]);
   exit;
    }else{

    $wareh = updatewarehouse::where('created_at','LIKE','%'.$name.'%')
                            ->Orwhere('quantity','LIKE','%'.$name.'%')
                            ->Orwhere('productname','LIKE','%'.$name.'%')->get();

    $output = '';
    if($wareh->count() > 0 ){
         $output .='
         <table  class="table table-bordered" id="report-list">

         <thead>
         <tr class="text-center text-black"><b>
                 <th class="text-center">#</th>
                <th class="">ID</th> 
                 <th class="">Companyname</th>                          
                  <th class="">Product Name</th>   
                  <th class="">Quantity</th>                          
                  <th class="">Cost</th>   
                  <th class="">Tcost</th> 
                  <th class="">Unit</th>
                   <th class="">Description</th>
                  <th class="">Created Date</th>        
                  <th class="">Delete</th> 
             </b></tr>
         </thead>
         <tbody>';
         $i = 1;
         $tcost1 = 0;
          $tcos =0;
     foreach($wareh as $wares){
                 $tcos += $wares->price;
                $tcost1 += $wares->tprice;
                 $output .= '<tr>    
                    <td class="text-center">'.$i++.'</td>             
                 <td class="text-center" name="check">'.$wares->id.'</td>
                 <td class="text-center" name="check">'.$wares->suppliersid->CompanyName.'</>
                 <td class="text-center" name="check">'.$wares->productname.'</td>
                 <td class="text-center" name="check">'.$wares->quantity.'</td>
                 <td class="text-center" name="check">'.$wares->price.'</td>
                 <td class="text-center" name="check">'.$wares->tprice.'</td>
                 <td class="text-center" name="check">'.$wares->unity.'</td>
                 <td class="text-center" name="check">'.$wares->description.'</td>
                <td class="text-center" name="check">'.$wares->created_at.'</td>
                 
                <td class="text-center">                     
 
                <button class="btn btn-sm btn-outline-danger delete_warehouseupdateload" type="button" data-id="'.$wares->id.'"                                       
                     >Delete</button>
 
                    
                     </td>
                 </tr>';
     }
     $output .='</tbody>
            <tfoot>
              <tr>
                <th colspan="5" class="text-center">Total</th>  
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

// delete warehouseupdateloadnew
public function delet_warehouseupdateloadnew(Request $request){            
            $id = $request->id;
           updatewarehouse::destroy($id);                      
    
                   
         return response()->json(['status'=>'success',]);
    
         }











  //warehouse new insert data to update the warehouse
   public function warehousenewupdate(Request $request){
 if ($request->product == '') {
   return response()->json(['status'=>0]);
     exit;
 }else{
    /*
    |'''''''''''''''''''''''''|
    |  for Warehouse          |
    |'''''''''''''''''''''''''|
    */
 //from the ajax to the for loop function
    
    for($x=0; $x < count($request->product); $x++){
        $sid = $request->sid[$x];
        $quantity1 = $request->quantity1[$x];
        $price1 = $request->price1[$x];
        $totalcost=(($quantity1)*($price1));
        


//from the for loop to find the each product from the table

        $data = warehouses::where('sid',$sid)->get();

//from the founding of each product to loop, from the foreach loop function
    foreach ($data as $datase)
        {
            $calc = (($datase->quantity) + ($quantity1));
            $costs = (($datase->multtotal) + ($totalcost));
       
        }

       $data = [
        'sid'=>$request->sid[$x],
        'supplier_id'=>$request->companyname[$x],
        'name'=>$request->product[$x],
        'quantity'=>$calc,
        'price'=>$request->price1[$x],
        'multtotal'=>$costs,
         'unit'=>$request->unit[$x],
        'description'=>$request->description[$x],
        /*'expire_date'=>$request->expiredate[$x],*/
       
       
            ];

        $test = warehouses::upsert($data, ['sid','supplier_id','name','quantity','price','multtotal','unit','description']);

       // var_dump($test);,'quantity','price',,'expire_date'
    }
  /*
    |'''''''''''''''''''''''''''''''''''''''''|
    |  insert all data into updatewarehouses  |
    |'''''''''''''''''''''''''''''''''''''''''|
    */

    //from the ajax to the for loop function
  for($y=0; $y < count($request->sid); $y++){

     $quantity1 = $request->quantity1[$y];
        $price1 = $request->price1[$y];
        $totalcost1=(($quantity1)*($price1));
        
   $data1 = [
        'product_id'=>$request->sid[$y],
        'companyname'=>$request->companyname[$y],
        'productname'=>$request->product[$y],
        'quantity'=>$quantity1,
        'price'=>$price1,
        'tprice'=>$totalcost1,
         'unity'=>$request->unit[$y],
        /*'description'=>$request->description[$x],*/
        /*'expiredate'=>$request->expiredate[$x],*/
       
       
            ];

        $test = updatewarehouse::upsert($data1, ['supplier_id','companyname','productname','quantity','price','tprice','unity']);
        }
        //echo($test);
      if($test > 0 ){
            return response()->json(['status'=>1]);
            
        }

}
}



    //warehouse page
     public function displyWarehouse(){
        return view('admin.warehouse', [
            'supplier' => suppliers::all(),
        ]);
    }

      //add warehouse product
    public function warehouseform(Request $request){  

         $data = warehouses::where('name',$request->name)->get();
        if($data->count() > 0 ){

        return response()->json(['status' => 2 ]);
        }else{
        $warehouse = warehouses::create([
            'supplier_id' => $request->companynameid,            
            'name' => $request->name, 
            'quantity' => $request->quantity, 
            'price' => $request->price,
            'multtotal' => $request->multtotal,
            'unit' => $request->unit,
            'description' => $request->description,
            'expire_date' => $request->expire_date,
            'picture' => $request->price,
        ]);

        $insertedId = $warehouse->sid;

     
        products::create([
            'product_id' =>$insertedId,
            'product_name' => $request->name,
           'product_no' =>'0',

        ]);



        return response()->json(['status'=>1, 'msg'=>'New Product has been save successfully']);
          












        
        // $validator = Validator::make($request->all(),[
        //     'fname'=>'required',
        //     'lname'=>'required',
        //     'address'=>'required',
        //     'number'=>'required',
            

        // ],[
        //     'fname.required'=>'First Name is Required',
        //     'lname.required'=>'Last Name is Required',
        //     'address.required'=>'Address is Required',
        //     'number.required'=>'Phone is Required',
           

        // ]); 
      
        // if(!$validator->passes()){
        //     return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
        //  }else{
            
            // warehouse::create([
            //     'supplier_id' => $request->fname,            
            //     'name' => $request->lname, 
            //     'price' => $request->address,
            //     'muttotal' => $request->number,
            //     'unit' => $request->number,
            //     'description' => $request->number,
            //     'expire_date' => $request->number,
            //     'muttotal' => $request->number,
            //     'muttotal' => $request->number,



                
            // ]);
            // return response()->json(['status'=>1, 'msg'=>'New Customer has been save successfully']);
              
        
      //}
        }
    }


     // fetchall customer data to table
     public function fetchallwarehouse()
     {
         $ware = warehouses::all();         
         $output = '';
         if($ware->count() > 0 ){
             $output .='
             <table id="mytable" class="table table-striped table-sm text-center align-middle">
             <thead>
                 <tr>
                     <th>ID</th>
                     <th>Product</th>                    
                     <th>Quantity</th>
                     <th>Price</th>
                     <th>Total Cost</th>
                     <th>Unit</th>  
                     <th>Description</th> 
                     <th>Expiring Date</th>                
                    
                     <th>Action</th>
                 </tr>
             </thead>
             <tbody>';
         foreach($ware as $wares){
                     $output .= '<tr>
                     <td>'.$wares->sid.'</td>                    
                     <td>'.$wares->name.'</>
                     <td>'.$wares->quantity.'</td>
                     <td>'.$wares->price.'</td>
                     <td>'.$wares->multtotal.'</td>
                     <td>'.$wares->unit.'</td>
                     <td>'.$wares->description.'</td>
                     <td>'.$wares->expire_date.'</td>
                     <td>                     
 
                     <button class="btn btn-sm btn-outline-primary update_ware" type="button" data-id="'.$wares->sid.'" 
                     data-toggle="modal" 
                     data-target="#payment_order"                     
                     >Edit</button>
 
                    
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
 



public function editwarehouse(Request $request){
    $id = $request->id;
        $ware = warehouses::find($id);
        return response()->json($ware);
}


public function updatewarehou(Request $request){
        
    //     $request->validate(
    //         [
    //             'id'=>'required|unique:up_id,'.$request->up_id,
                
    //             'upFullName'=>'required',
    //              'upDOB'=>'required',
    //         ],
    //         [
    //             'up_id.required'=>'ID is Required',
    //             'upFullName.required'=>'Name is Required',
    //             'upDOB.required'=>'DOB is Required',
    //         ]
    //  );


   $data = warehouses::where('name',$request->name)->get();


if($data->count() > 0 ){

 return response()->json([
    'status' => 100
     ]);

}else{

      
      $wareh = warehouses::find($request->sid);       
    $warehouseData =[  
        // 'sid' => $request->id,    
        'supplier_id' => $request->companynameid, 
        'name' => $request->name,            
        'quantity' => $request->quantity,
        'price' => $request->price,
        'multtotal' => $request->multtotal,
        'unit' => $request->unit,
        'description' => $request->description,
        'expire_date' => $request->expire_date,
        
    ];

    $wareh->update($warehouseData);


    $ware = products::find($request->sid);       
    $productData =[  
        // 'sid' => $request->id,    
        'product_name' => $request->name,          
        
        
    ];

    $ware->update($productData);



    return response()->json([
    'status' => 200
     ]);

     }

}















}

