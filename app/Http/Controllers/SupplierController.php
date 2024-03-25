<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\suppliers;
use App\Models\suppliercompany;
use App\Models\supplierdeliver;
use App\Models\cashtypee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class SupplierController extends Controller

{


     //display payment
    public function displyPayment(){
        return view('admin.overalltotalpaymen', [
            'supplier' => suppliers::all(),
        ]);
    }




     // fetchall Payment data to table
    public function fetchallPayment()
    {
        $cust = cashtypee::all();


        $output = '';
        $i = 1;
        if($cust->count() > 0 ){
            $output .='
            <table class="table table-striped table-sm text-center align-middle">
            <thead>
                <tr>
                <th class="text-center">#</th>
                     <th class="text-center">Date</th>
                    <th class="text-center">Batch No.</th>                      
                    <th class="text-center">Supplier Name</th>          
                    <th class="text-center">Currentpayment</th>
                    <th class="text-center">Current Billing</th>
                    <th class="text-center">Payable Amount</th>
                    <th class="text-center">Paid Amount</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>';
        foreach($cust as $cus){
                    $output .= '<tr>
                     <td class="text-center">
                     '.$i++.'
                  </td>
                    <td>'.$cus->created_at.'</td>                    
                    <td>'.$cus->batchno.'</td>
                    <td>'.$cus->suppliersid->CompanyName.'</td>
                    <td>'.$cus->currentpayment.'</td>
                    <td>'.$cus->suppliercurentbilling.'</td>
                    <td>'.$cus->amountpayable.'</td>
                    <td>'.$cus->amountpaid.'</td>
                    <td> 
                    <button class="btn btn-sm btn-outline-primary view_customer" type="button" id="'.$cus->id.'"  
                    data-toggle="modal" 
                    data-target="#view_modals"                     
                    >View</button>

                    <button class="btn btn-sm btn-outline-primary update_paymentorder" type="button" data-id="'.$cus->id.'" 
                    data-toggle="modal" 
                    data-target="#payment_order"                     
                    >Edit</button>

                    <button class="btn btn-sm btn-outline-danger delete_payments" type="button" data-id="'.$cus->id.'" 
                    data-toggle="modal"                                       
                    >Delete</button>
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



    //add supplier payment
public function paymentform(Request $request){

        //extract($_POST);
      
//dd($request->supppliername);
        if(empty($request->id)){

             $save= cashtypee::create([
                'suppliername' =>$request->suppliername,            
                'batchno' => $request->batchno, 
                'currentpayment' => $request->currentpayment,
                 'suppliercurentbilling' => $request->suppliercurrentbilling,
                  'amountpaid' => $request->amountpaid,
                   'amountpayable' => $request->amountpayable,
                    'remark' => $request->remark,

            ]);
                        
        }else{          
        }     


        if($save)
            return 1;
}

// delete PaymentOrder
public function deletePaymentorde(Request $request){            
        $id = $request->id;
       cashtypee::destroy($id);                      
       //echo $id;
               
    return response()->json(['status'=>'success']);

     }



public function edittotalpayment(Request $request)
    {
        $id = $request->id;
        $pays = cashtypee::find($id);
        return response()->json($pays);
        
    }




    //display deliverSupplier
    public function deliverSupplier(){
        return view('admin.supplierDeliver', [
            'supplier' => suppliers::all(),
        ]);
    }



    //add supplierldeliver
      public function supplierliveryform(Request $request){ 
        $id = "";
        extract($_POST);
        
        
            $validator = Validator::make($request->all(),[
            'companynameid'=>'required',
           

        ],[
            'companynameid.required'=>'Company Name is Required',
           
    ]); 
      
    if(!$validator->passes()){
        return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
       }else{
            
             $suplas = suppliercompany::create([
                'companynameid' => $request->companynameid,            
                'price2' => $request->price2, 
                'multtota2' => $request->multtota2,
               
            ]);

              $insertedId = $suplas->id;
             
            $test ='';
            
             foreach($sid as $k =>$v){
               
               $names = $request->name[$k];
               $qty = $request->quantity[$k];
               $pri = $request->price[$k];
               $mul = $request->multtota[$k];
               $uni = $request->unit[$k];
               $des = $request->description[$k];
                $data = [
                 'supplierid' => $insertedId,
                     'name' => $names,
                     'quantity' =>$qty, 
                     'price' => $pri,
                    'multtota' =>$mul,
                    'unit' => $uni,
                    'description' => $des,
                ];

            if($names == '' && $qty == '' && $mul == '' && $uni == '' && $des ==''){
                exit;
               }else{
              
        supplierdeliver::upsert($data, ['supplierid','name','quantity','multtota','unit','description']);
                 }  
          // return response()->json(['status'=>1, 'msg'=>'New Supplier has been save successfully']);
              
        
      }
  
    }
}







    // fetchall supplierliver data to table
    public function fetchallsupplierliver(){
           //
$supde = DB::table('supplierdelivers')
                ->join('suppliercompanies', 'supplierdelivers.supplierid', '=', 'suppliercompanies.id')
                ->join('suppliers', 'suppliercompanies.companynameid', '=' , 'suppliers.id')
               ->select('suppliercompanies.id as idd','suppliers.id','supplierdelivers.created_at','suppliers.CompanyName',DB::raw('SUM(supplierdelivers.price) as ptota'), DB::raw('SUM(supplierdelivers.multtota) as ttota'))              
              ->groupBy('suppliercompanies.id','suppliers.id','suppliers.CompanyName','supplierdelivers.supplierid','supplierdelivers.created_at')
              ->orderBy('supplierdelivers.created_at')
               ->get();

        $output = '';
        $i = 1;
        if($supde->count() > 0 ){
            $output .='<table   class="table align-middle table-hover" id="mytable">
                    <thead class="bg-white mb-0">
                    <tr>
                  <th class="text-center">#</th>
                   <th class="text-center">ID | Name</th>
                   <th class="text-center">Price</th>
                   <th class="text-center">TCost</th>
                   <th class="text-center">Date</th>
                    <th class="text-center">Action</th>
                  </tr></thead><tbody>'; 
        foreach($supde as $supp){
                    $output .= '<tr>
                    <td class="text-center">'.$i++.'</td>
                  <td class="text-center">'.$supp->id.' ~ '.$supp->CompanyName.'</>
                    <td class="text-center">'.number_format($supp->ptota,2).'</>
                    <td class="text-center">'.number_format($supp->ttota,2).'</td>
                    <td class="text-center">'.$supp->created_at.'</td>          
                    <td class="text-center"> 
                    <button class="btn btn-sm btn-outline-primary view_supplier" type="button" id="'.$supp->idd.'"  
                    data-toggle="modal" 
                    data-target="#view_modals"                     
                    >View</button>

                    <button class="btn btn-sm btn-outline-primary update_supplier" type="button" data-id="'.$supp->idd.'" 
                    data-toggle="modal" 
                    data-target="#updatesupplier"                     
                    >Edit</button>

                    <button class="btn btn-sm btn-outline-danger delete_supplier" type="button" data-id="'.$supp->idd.'" 
                    data-toggle="modal" 
                                    

                    >Delete</button>
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


    //display supplier
    public function displySupplier(){
        return view('admin.supplier');
    }



      //add supplier
      public function supplierform(Request $request){  
        
        $validator = Validator::make($request->all(),[
            'companyname'=>'required',
            'fullName'=>'required',
            'address'=>'required',
            'phonenumber'=>'required',
            

        ],[
            'companyname.required'=>'First Name is Required',
            'fullName.required'=>'Last Name is Required',
            'address.required'=>'Address is Required',
            'phonenumber.required'=>'Phone is Required',
           

        ]); 
      
        if(!$validator->passes()){
            return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
         }else{
            
            suppliers::insert([
                'CompanyName' => $request->companyname,            
                'FullName' => $request->fullName, 
                'Address' => $request->address,
                'Phonenumber' => $request->phonenumber,
                
            ]);
            return response()->json(['status'=>1, 'msg'=>'New Supplier has been save successfully']);
              
        
      }
  
    }




    // fetchall supplier data to table
    public function fetchallsupplier()
    {
        $supp = suppliers::all();
        $output = '';
        if($supp->count() > 0 ){
            $output .='
            <table class="table table-striped table-sm text-center align-middle">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Company Name</th>
                    <th>Full Name</th>
                    <th>Address</th>
                    <th>Phone Number</th>                    
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>';
        foreach($supp as $sup){
                    $output .= '<tr>
                    <td>'.$sup->id.'</td>                    
                    <td>'.$sup->CompanyName.'</>
                    <td>'.$sup->FullName.'</td>
                    <td>'.$sup->Address.'</td>
                    <td>'.$sup->Phonenumber.'</td>
                    <td> 
                    <button class="btn btn-sm btn-outline-primary view_supplier" type="button" id="'.$sup->id.'"  
                    data-toggle="modal" 
                    data-target="#view_modals"                     
                    >View</button>

                    <button class="btn btn-sm btn-outline-primary update_supplier" type="button" data-id="'.$sup->id.'" 
                    data-toggle="modal" 
                    data-target="#updatesupplier"                     
                    >Edit</button>

                    <button class="btn btn-sm btn-outline-danger delete_supplier" type="button" data-id="'.$sup->id.'" 
                    data-toggle="modal" 
                                       
                    >Delete</button>
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


     public function editSupplier(Request $request)
     {
         $id = $request->id;
         $suppl = suppliers::find($id);
         return response()->json($suppl);
         
     }



// update Customer 
public function updateSupplier(Request $request){
        
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
      
      $suppl = suppliers::find($request->up_id);       
    $supplData =[
        'id' => $request->up_id, 
        'CompanyName' => $request->upcompanyname,            
        'FullName' => $request->upfullname, 
        'Address' => $request->upaddress,
        'Phonenumber' => $request->upnumber,

       
        
    ];
    $suppl->update($supplData);
    return response()->json([
    'status' => 200
     ]);

     }




     public function deleteSupplier(Request $request){            
        $id = $request->id;
       suppliers::destroy($id);                      

               
     return response()->json([
        'status'=>'success',
     ]);

     }
















}
