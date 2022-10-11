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
                        <h3 class="card-title">Add Category</h3>
                    </div>
                    
                    <form role="form" method="post" action="{{ route('category.store') }}">
                    
                        @csrf
                        
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Category Name</label>
                                    <input type="text" name="cat_name" class="form-control" id="exampleInputEmail1" placeholder="Add Category Name">
                            </div>
                        </div>
                        
                        <div class="form-group">
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



