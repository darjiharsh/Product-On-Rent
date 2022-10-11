<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Subcategory;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategoryarray = Subcategory :: join('categories','subcategories.category_id','=','categories.category_id')
                            ->select('subcategories.*','categories.*')->get();
        return view('subcategory.index', compact('subcategoryarray'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoryarray = Category :: all();
        return view('subcategory.create', compact('categoryarray'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cat=$request->input('cat_id');

        if($cat=="0")
        {
            echo "<script> alert('Please Select a Category') </script>";
            
            $categoryarray = Category :: all();
            return view('subcategory.create', compact('categoryarray'));
        }

        $subcategoryq = new Subcategory([
            'subcategory_name' => $request->input('sub_cat_name'),
            'category_id' => $request->input('cat_id')
        ]);

        $subcategoryq->save();

        return redirect('subcategory');
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
        // $subcategoryarray = Subcategory :: join('categories','subcategories.category_id','=','categories.category_id')
        //                                     ->select('subcategories.*','categories.*')->get();

        $subcategoryarray = Subcategory :: where('subcategory_id', $id)->first();

        $a = $subcategoryarray['category_id'];

        $categoryq = Category :: where('category_id', $a)->first();

        $cat_id = $categoryq['category_id'];
        
        $categoryarray = Category :: all();

        return view('subcategory.edit',compact('subcategoryarray','categoryarray','cat_id'));
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
        // echo $request->get('sub_cat_name')."<br>";
        // echo $request->get('cat_id')."<br>";
        // exit();
        $subcategoryarray = Subcategory :: where('subcategory_id', $id)->first();

        $subcategoryarray -> subcategory_name = $request->get('sub_cat_name');
        $subcategoryarray -> category_id = $request->get('cat_id');

        $subcategoryarray->save();

        return redirect('subcategory');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategoryq = Subcategory :: find($id);

        $subcategoryq->delete();

        return redirect('subcategory');
    }
}
