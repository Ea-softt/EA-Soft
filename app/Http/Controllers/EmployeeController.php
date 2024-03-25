<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\employee;
use Illuminate\Contracts\View\View;;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function show(){

         return view('admin/employee');
    }


    // fetchall employee data to table
    public function fetchall()
    {
        $emps = employee::all();
        $output = '';
        if($emps->count() > 0 ){
            $output .='
            <table class="table table-striped table-sm text-center align-middle">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Avatar</th>
                    <th>Name</th>
                    <th>DOB</th>
                    <th>Age</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>';
             //<td><img src="/storage/files/'.$emp->avatar.'" width="50" alt="" class="img-thumbnail rounded-circle"</td>
        foreach($emps as $emp){
                    $output .= '<tr>
                    <td>'.$emp->id.'</td>
                   <td>'.$emp->id.'</td>
                    <td>'.$emp->FullName.'</td>
                    <td>'.$emp->DOB.'</td>
                    <td>'.$emp->Age.'</td>
                    <td>
                    <button class="btn btn-sm btn-outline-primary view_employee" type="button" id="'.$emp->id.'"
                    data-toggle="modal"
                    data-target="#uni_modals"
                    >View</button>

                    <button class="btn btn-sm btn-outline-primary update_employee" type="button" data-id="'.$emp->id.'"
                    data-toggle="modal"
                    data-target="#updateemployee"
                    >Edit</button>

                    <button class="btn btn-sm btn-outline-danger delete_employee" type="button" id="'.$emp->id.'"
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

        //add employee
    public function employeefor(Request $request){

        $validator = Validator::make($request->all(),[
            'FullName'=>'required',
            // 'DOB'=>'required',
            // 'Age'=>'required',
            // 'Gender'=>'required',
            // 'Language'=>'required',
            // 'Hometown'=>'required',
            // 'Nationality'=>'required',
            // 'Religion'=>'required',
            // 'Lastschool'=>'required',
            // 'Qualification'=>'required',
            // 'Phonenum'=>'required',
            // 'Mail'=>'required',
            // 'Address'=>'required',
            // 'Address2'=>'required',
            // 'Department'=>'required',
            // 'StartingDate'=>'required',
            // 'Status'=>'required',
            // 'Employer'=>'required',
           // 'avatar'=>'required'

        ],[
            'FullName.required'=>'Name is Required',
           //  'DOB.required'=>'DOB is Required',
           //  'Age.required'=>' is Required',
           //  'Gender.required'=>' is Required',
           //  'Language.required'=>' is Required',
           //  'Hometown.required'=>' is Required',
           //  'Nationality.required'=>' is Required',
           //  'Religion.required'=>' is Required',
           //  'Lastschool.required'=>' is Required',
           // 'Qualification.required'=>' is Required',
           // 'Phonenum.required'=>' is Required',
           // 'Mail.required'=>' is Required',
           // 'Address.required'=>' is Required',
           // 'Address2.required'=>' is Required',
           // 'Department.required'=>' is Required',
           // 'StartingDate.required'=>' is Required',
           // 'Status.required'=>' is Required',
           // 'Employer.required'=>' is Required',
          // 'avatar.required'=>' is Required',

        ]);

        if(!$validator->passes()){
            return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
         }else{
            // $path = 'files/';
            // $file = $request->file('avatar');
            // $fileName = time().'_'.$file->getClientOriginalName();
            // $upload = $file->storeAs($path, $fileName, 'public');

       
            employee::insert([
                'FullName' => $request->FullName,
                'DOB' => $request->DOB,
                'Age' => $request->Age,
                'Gender' => $request->Gender,
                'Language' => $request->Language,
                'Hometown' => $request->Hometown,
                'Nationality' => $request->Nationality,
                'Religion' => $request->Religion,
                'Lastschool' => $request->Lastschool,
                'Qualification' => $request->Qualification,
                'Phonenum' => $request->Phonenum,
                'Mail' => $request->Mail,
                'Address' => $request->Address,
                'Address2' => $request->Address2,
                'Department' => $request->Department,
                'StartingDate' => $request->StartingDate,
                'Status' => $request->Status,
                'Employer' => $request->Employer,
              //  'avatar' =>$fileName,
            ]);
            return response()->json(['status'=>1, 'msg'=>'New Employee has been save successfully']);

        
      }

    }


      /**
     * Show the form for editing the specified resource.
     */
    public function editEmployee(Request $request)
    {
        $id = $request->id;
        $emp = employee::find($id);
        return response()->json($emp);

    }



    //Update product

    public function updateEmployee(Request $request){

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
      $fileName = '';
      $empl = employee::find($request->up_id);
    if($request->hasFile('avatar')) {

        $path = 'files/';
            $file = $request->file('avatar');
            $fileName = time().'_'.$file->getClientOriginalName();
             $file->storeAs($path, $fileName, 'public');

        if ($empl->avatar) {
            $path = '/storage/files/';
            Storage::delete($path. $empl->avatar);
        }
    }else{
        $fileName = $request->emp_avatar;
    }
    $emplData =[
        'id' => $request->upid,
        'FullName' => $request->upFullName,
        'DOB' => $request->upDOB,
        'Age' => $request->upAge,
        'Gender' => $request->upGender,
        'Language' => $request->upLanguage,
        'Hometown' => $request->upHometown,
        'Nationality' => $request->upNationality,
        'Religion' => $request->upReligion,
        'Lastschool' => $request->upLastschool,
        'Qualification' => $request->upQualification,
        'Phonenum' => $request->upPhonenum,
        'Mail' => $request->upMail,
        'Address' => $request->upAddress,
        'Address2' => $request->upAddress2,
        'Department' => $request->upDepartment,
        'StartingDate' => $request->upStartingDate,
        'Status' => $request->upStatus,
        'Employer' => $request->upEmployer,
        'avatar' => $fileName,

    ];
    $empl->update($emplData);
    return response()->json(['status' => 200]);

     }



    //  employee::where('id',$request->upid)->update([
    //     'FullName' => $request->upFullName,
    //     'DOB' => $request->upDOB,
    //     'Age' => $request->upAge,
    //     'Gender' => $request->upGender,
    //     'Language' => $request->upLanguage,
    //     'Hometown' => $request->upHometown,
    //     'Nationality' => $request->upNationality,
    //     'Religion' => $request->upReligion,
    //     'Lastschool' => $request->upLastschool,
    //     'Qualification' => $request->upQualification,
    //     'Phonenum' => $request->upPhonenum,
    //     'Mail' => $request->upMail,
    //     'Address' => $request->upAddress,
    //     'Address2' => $request->upAddress2,
    //     'Department' => $request->upDepartment,
    //     'StartingDate' => $request->upStartingDate,
    //     'Status' => $request->upStatus,
    //     'Employer' => $request->upEmployer,




     public function deleteEmployee(Request $request){
        $path = '/storage/files/';
        $id = $request->id;
        $emplo = employee::find($id);
        if(Storage::delete($path. $emplo->avatar)){
            employee::destroy($id);
        }



     return response()->json([
        'status'=>'success',
     ]);

     }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function employ($id)
    {
        ///return view('makskdskd skdlskdl slkdls');



    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
