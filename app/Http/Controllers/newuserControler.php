<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;




class newuserControler extends Controller
{
    public function shownewuser(){
    return view('admin.newuser', [
            'users' => user::all(),
        ]);

  }


  public function regist(){
    return view('admin.regist');

  }



public function fetch_newuser(){

        $cust = user::all();
        $output = '';
        if($cust->count() > 0 ){
            $i = 0;
            $output .='
            <table class="table table-striped table-sm text-center align-middle">
            <thead>
                <tr>
                     <th>#</th>
                    <th>ID</th>
                    <th>UserName</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Department</th>
                     <th>Status</th>                     
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>';
        foreach($cust as $cus){
                    $output .= '<tr>
                      <td>'.$i++.'</td>  
                    <td>'.$cus->id.'</td>                    
                    <td>'.$cus->name.'</>
                    <td>'.$cus->email.'</td>
                    <td>'.$cus->password.'</td>
                     <td>'.$cus->role.'</td>
                     <td>'.$cus->status.'</td>
                    <td> 
                   
                    <center>
                            <div class="btn-group">                           
                              <button type="button" class="btn btn-primary btn-sm dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              
                              Action</button>
                              <div class="dropdown-menu" aria-haspopup="true">
                                <a class="dropdown-item edit_newuser" data-toggle="modal" 
                                   data-target="#updatecustomer" href="javascript:void(0)" data-id ="'.$cus->id.'" >Edit</a>



                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item delete_newuser" href="javascript:void(0)" data-id ="'.$cus->id.'" >Delete</a>
                              </div>
                            </div>
                        </center>
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


      public function editnewuser(Request $request)
    {
        $id = $request->id;
        $emp = user::find($id);
        return response()->json($emp);
        
    }

// update Customer 
    public function updateNewuser(Request $request){

      //  echo($request->id);
        
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
          
          $custs = user::find($request->id);       
        $custData =[
            'id' => $request->id, 
            'name' => $request->name,            
            'email' => $request->email, 
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'status' => $request->status,
           
            
        ];
        $custs->update($custData);
        return response()->json([
        'status' => 200
         ]);
    
         }





         public function deleteNewuser(Request $request){            
            $id = $request->id;
           user::destroy($id);                      
    
                   
         return response()->json([
            'status'=>'success',
         ]);
    
         }



}
