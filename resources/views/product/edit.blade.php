@extends('master.layout')

@section('content')

<form action="{{ route('product.update',$productarray->product_id) }}" method="post" enctype="multipart/form-data">
    
    @csrf
    @method('PATCH')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card card-info">
                            
                            <div class="card-header">
                                <h3 class="card-title">Edit Product</h3>
                            </div>
                            
                            <div class="card-body">

                                <div class="input-group mb-3">                                    
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-chevron-circle-down"></i></span>
                                    </div>                                    
                                    <select class="form-control" name="sub_cat_id">
                                        <option value="0">Select Category</option>
                                        @foreach ($subcategoryarray as $subcategory)
                                            <option value="{{ $subcategory->subcategory_id }}" @if($sub_cat_id==$subcategory->subcategory_id) {{'selected'}} @endif>{{ $subcategory->subcategory_name }}</option>
                                        @endforeach                                        
                                    </select>
                                </div>
                                
                                <div class="input-group mb-3">                                    
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-circle"></i></span>
                                    </div>                                    
                                    <input type="text" class="form-control" placeholder="Product Name" name="pro_name" value="{{ $productarray->product_name }}">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-info-circle"></i></span>
                                    </div>
                                    <textarea class="form-control" rows="3" placeholder="Enter Detail..." name="pro_detail">{{ $productarray->product_details }}</textarea>
                                </div>
                                
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-university"></i></span>
                                    </div>
                                    <input type="number" class="form-control" placeholder="Product Price" name="pro_price" value="{{ $productarray->product_cost }}">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-key"></i></span>
                                    </div>
                                    <input type="number" class="form-control" placeholder="Product Quantity" name="pro_qty" value="{{ $productarray->product_quantity }}">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-circle"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Product Note" name="pro_note" value="{{ $productarray->product_note }}">
                                </div>

                                <center><input type="submit" class="btn btn-success" value="ADD" style="width: 100px"/></center>
                           
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

</form>

@endsection