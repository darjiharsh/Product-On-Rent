<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Subcategory;
use App\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productarray = Product :: join('subcategories','products.subcategory_id','=','subcategories.subcategory_id')
                                    ->select('products.*','subcategories.*')->get();

        return view('product.index',compact('productarray'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcategoryarray = Subcategory :: all();
        return view('product.create', compact('subcategoryarray'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $img = $request->file('pro_img');

        $og = $img->getClientOriginalName();

        storage::disk('public')->put($og, File::get($img));

        $productq = new Product([

            'product_name' => $request->input('pro_name'),
            'product_details' => $request->input('pro_detail'),
            'product_cost' => $request->input('pro_price'),
            'product_quantity' => $request->input('pro_qty'),
            'product_note' => $request->input('pro_note'),
            'product_img_path' => $og,
            'subcategory_id' => $request->input('sub_cat_id')

        ]);

        $productq->save();

        $pro_id = $productq->product_id;

        $imageq = new Image([

            'image_name' => $og,
            'image_path' => $img,
            'product_id' => $pro_id
        ]);

        $imageq->save();

        return redirect('product');
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
        $productarray = Product :: where('product_id', $id)->first();

        $a = $productarray['subcategory_id'];

        $subcategoryq = Subcategory :: where('subcategory_id', $a)->first();

        $sub_cat_id = $subcategoryq['subcategory_id'];
        
        $subcategoryarray = Subcategory :: all();

        return view('product.edit',compact('productarray','subcategoryarray','sub_cat_id'));
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
        $productq = Product :: where('product_id', $id)->first();

        $productq->product_name = $request->get('pro_name');
        $productq->product_details = $request->get('pro_detail');
        $productq->product_cost = $request->get('pro_price');
        $productq->product_quantity = $request->get('pro_qty');
        $productq->product_note = $request->get('pro_note');
        $productq->subcategory_id = $request->get('sub_cat_id');

        $productq->save();

        return redirect('product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $imagearray = Image :: where('product_id', $id)->first();
        $image_id = $imagearray['image_id'];

        $productq = Product::find($id);
        $imageq = Image::find($image_id);
        $image_path = public_path().'/upload/'.$imagearray->image_name;
        
        File::delete($image_path);
        $productq->delete();
        $imageq->delete();

        return redirect('product');
    }
}
