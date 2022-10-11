@extends('master.layout')

@section('content')

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Change Sub Category</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{ route('subcategory.update',$subcategoryarray -> subcategory_id) }}">
              @csrf
              @method('PATCH')
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        
                        <div class="form-group">
                            <label>Select Category</label>
                            <select class="custom-select" name="cat_id">
                                
                                @foreach($categoryarray as $category)
                                    <option value="{{ $category -> category_id }}" @if($cat_id==$category->category_id) {{'selected'}} @endif>
                                        {{ $category -> category_name }}
                                    </option>
                                @endforeach
                                
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Add Sub Category Name</label>
                <input type="text" name="sub_cat_name" class="form-control" id="exampleInputEmail1" placeholder="Add Sub Category Name" value="{{ $subcategoryarray -> subcategory_name }}">
                </div>
            </div>              

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

            </form>
          </div>
        </div>
      </div>
    </div>
</section> 

@endsection