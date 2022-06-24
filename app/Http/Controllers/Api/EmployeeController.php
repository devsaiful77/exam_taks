<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    /*
        =========================
        DATABASE OPERATION
        =========================
    */
    public function getEmployee(){
        return $data = Employee::orderBy('empl_id','DESC')->select('empl_name','empl_phone','empl_salary','empl_address','empl_photo','empl_status','empl_id')->get();
    }

    /*
        =========================
        DATABASE OPERATION END
        =========================
    */

    public function index()
    {
        $employee = $this->getEmployee();
        return response()->json($employee);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // form validation
        $validateData = $request->validate([
            'empl_name' => 'required|max:45|min:3',
            'empl_phone' => 'required|max:20|min:11|unique:employees,empl_phone',
            'empl_email' => 'required|max:45|min:11|unique:employees,empl_email',
            'empl_salary' => 'required|numeric',
            'empl_dob' => 'required',
            'empl_address' => 'required',
            'empl_status' => 'required',
            'image' => 'required'
        ]);

        // make image ====
        $position = strpos($request->image, ';');
        $sub = substr($request->image, 0, $position);
        $ext = explode('/', $sub)[1];

        $name = time().".".$ext;
        $img = Image::make($request->image)->resize(240,200);
        $upload_path = 'uploads/employee/';
        $image_url = $upload_path.$name;
        $img->save($image_url);
        // make image ====

        $store = Employee::insertGetId([
            'empl_name' => $request->empl_name,
            'empl_phone' => $request->empl_phone,
            'empl_email' => $request->empl_email,
            'empl_salary' => $request->empl_salary,
            'empl_dob' => $request->empl_dob,
            'empl_address' => $request->empl_address,
            'empl_status' => $request->empl_status,
            'empl_creator' => 1,
            'empl_slug' => strtolower( str_replace(' ','-',$request->empl_name) ),
            'empl_photo' => $image_url,
            'created_at' => Carbon::now(),
        ]);




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}



