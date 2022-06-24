<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;


class PartnerController extends Controller
{
    public function index()
    {
        $partner = Partner::orderBy('id','DESC')->get();
        return response()->json($partner);
    }


    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:60',
            'address' => 'required|max:200',
            'parcentage' => 'required|numeric|max:100',
        ]);
        // image uploade
        if($request->image){
            $position = strpos($request->image, ';');
            $sub = substr($request->image, 0, $position);
            $ext = explode('/', $sub)[1];

            $name = time().".".$ext;
            $img = Image::make($request->image)->resize(240,200);
            $upload_path = 'uploads/partner/';
            $image_url = $upload_path.$name;
            $img->save($image_url);

            /*
            ======== insert data in database ========
            */
            $partner = new Partner;
            $partner->name = $request->name;
            $partner->location = $request->address;
            $partner->parcantage = $request->parcentage;
            $partner->image = $image_url;
            $partner->save();

        }else{
            /*
            ======== insert data in database ========
            */
            $partner = new Partner;
            $partner->name = $request->name;
            $partner->location = $request->address;
            $partner->parcantage = $request->parcentage;
            $partner->save();
        }




    }


    public function show($id)
    {
        $partner = DB::table('partners')->where('id',$id)->first();
        return response()->json($partner);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $partner = DB::table('partners')->where('id',$id)->first();
        // return response()->json($partner);
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
        $partner = DB::table('partners')->where('id',$id)->first();
        if($partner->image){
            unlink($partner->image);
            DB::table('partners')->where('id',$id)->delete();
        }else{
            DB::table('partners')->where('id',$id)->delete();
        }
    }
}
