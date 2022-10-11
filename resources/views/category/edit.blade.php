@extends('master.layout')

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            
            <div class="col-md-3">
            </div>

            <div class="col-md-6">
                <div class="card card-primary">
                    
                    <div class="card-header">
                        <h3 class="card-title">Edit Category</h3>
                    </div>

                    <form role="form" method="post" action="{{ route('category.update',$categoryarray->category_id) }}">

                        @csrf
                        @method('PATCH')

                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Category Name</label>
                                <input type="text" name="cat_name" class="form-control" id="exampleInputEmail1" value="{{$categoryarray->category_name}}" placeholder="Add Category Name">
                            </div>
                        </div>

                        <div class="form-group">
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">Change</button>
                            <a href="{{URL :: route('category.index') }}" class="btn btn-primary">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection



