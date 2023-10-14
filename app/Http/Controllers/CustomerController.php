<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;





class CustomerController extends Controller
{
    //
    public function displyCustomer(){
        return view('customer');
    }


      //add employee
    public function customerform(Request $request){  
        
        $validator = Validator::make($request->all(),[
            'fname'=>'required',
            'lname'=>'required',
            'address'=>'required',
            'number'=>'required',
            

        ],[
            'fname.required'=>'First Name is Required',
            'lname.required'=>'Last Name is Required',
            'address.required'=>'Address is Required',
            'number.required'=>'Phone is Required',
           

        ]); 
      
        if(!$validator->passes()){
            return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
         }else{
            
            customer::insert([
                'FirstName' => $request->fname,            
                'LastName' => $request->lname, 
                'Address' => $request->address,
                'phonenumber' => $request->number,
                
            ]);
            return response()->json(['status'=>1, 'msg'=>'New Customer has been save successfully']);
              
        
      }
  
    }




    // fetchall customer data to table
    public function fetchallcustomer()
    {
        $cust = customer::all();
        $output = '';
        if($cust->count() > 0 ){
            $output .='
            <table class="table table-striped table-sm text-center align-middle">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>FullName</th>
                    <th>Address</th>
                    <th>PhoneNumber</th>                    
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>';
        foreach($cust as $cus){
                    $output .= '<tr>
                    <td>'.$cus->id.'</td>                    
                    <td>'.$cus->FirstName.' '.$cus->LastName.'</>
                    <td>'.$cus->Address.'</td>
                    <td>'.$cus->phonenumber.'</td>
                    <td> 
                    <button class="btn btn-sm btn-outline-primary view_customer" type="button" id="'.$cus->id.'"  
                    data-toggle="modal" 
                    data-target="#view_modals"                     
                    >View</button>

                    <button class="btn btn-sm btn-outline-primary update_customer" type="button" data-id="'.$cus->id.'" 
                    data-toggle="modal" 
                    data-target="#updatecustomer"                     
                    >Edit</button>

                    <button class="btn btn-sm btn-outline-danger delete_customer" type="button" data-id="'.$cus->id.'" 
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


 /**
     * Show the form for editing the specified resource.
     */
    public function editCustomer(Request $request)
    {
        $id = $request->id;
        $emp = customer::find($id);
        return response()->json($emp);
        
    }



// update Customer 
    public function updateCustomer(Request $request){
        
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
          
          $custs = customer::find($request->up_id);       
        $custData =[
            'id' => $request->up_id, 
            'FirstName' => $request->upfname,            
            'LastName' => $request->uplname, 
            'Address' => $request->upaddress,
            'phonenumber' => $request->upnumber,
           
            
        ];
        $custs->update($custData);
        return response()->json([
        'status' => 200
         ]);
    
         }




         public function deleteCustomer(Request $request){            
            $id = $request->id;
           customer::destroy($id);                      
    
                   
         return response()->json([
            'status'=>'success',
         ]);
    
         }


















}
