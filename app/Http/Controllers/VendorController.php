<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Vendor;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendorarray = Vendor :: all();
        return view('vendor.index', compact('vendorarray'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $file123 = $request->file('vendor_img');
        
        $original_name = $file123->getClientOriginalName();

        Storage::disk('public')->put($original_name, File::get($file123));

        $vendorq = new Vendor([

            'vendor_name' => $request->input('vendor_name'),
            'vendor_email' => $request->input('vendor_mail'),
            'vendor_password' => $request->input('vendor_pass'),
            'vendor_gender' => $request->input('r1'),
            'vendor_address' => $request->input('vendor_add'),
            'vendor_image_path' => $original_name

        ]);

        $vendorq->save();

        return redirect('vendor');
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
        $vendorarray = Vendor :: where('vendor_id', $id)->first();

        $gender = $vendorarray['vendor_gender'];

        return view('vendor.edit', compact('vendorarray','gender'));
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
        $vendorarray = Vendor :: where('vendor_id', $id)->first();

        $vendorarray->vendor_name = $request->get('vendor_name');
        $vendorarray->vendor_email = $request->get('vendor_mail');
        $vendorarray->vendor_gender = $request->get('r1');
        $vendorarray->vendor_address = $request->get('vendor_add');

        $vendorarray->save();

        return redirect('vendor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vendorq = Vendor :: where('vendor_id', $id)->first();

        $img = public_path().'/upload/'.$vendorq->vendor_image_path;

        File::delete($img);

        $vendorq->delete();

        return redirect('vendor');


    }
}
