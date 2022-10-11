@extends('master.layout')

@section('content')


        <div class="row">
          <div class="col-12">
<div class="card">
    <div class="card-header">
      <h3 class="card-title">View Category</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>No</th>
          <th>Sub Category Name</th>
          <th>Category Name</th>
          <th>Edit</th>
          <th>Delete</th>
          
        </tr>
        </thead>
        
            </tr>
            @foreach ($subcategoryarray as $category)
          
            <tr>
              <td>1</td>
            <td>{{ $category->subcategory_name }}</td>
              <td>{{$category->category_name}}</td>
            <td>
              
                <a href="{{ route('subcategory.edit',$category->subcategory_id)}}">
                  <button class="btn btn-primary" type="submit">
                    <i class="fas fa-edit" style="size: 9cm">
                      Edit
                    </i>
                  </button>
                </a> 
            </td>
            <td>
              
                {{-- <a href="{{ route('category.destroy',$category->category_id) }}">
                  <button class="btn btn-danger" type="submit">
                    <i class="fas fa-trash" style="size: 9cm">
                      DELETE
                    </i>
                  </button>
                </a> --}}
              
              
              <form action="{{ route('subcategory.destroy',$category->subcategory_id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                  <i class="fas fa-trash" style="size: 9cm">
                    DELETE
                  </i>
                </button>
              </form>
                
            </td>
            
            </tr>
          
          @endforeach
        
        <tfoot>
        <tr>
          <th>No</th>
          <th>Sub Category Name</th>
          <th>Category Name</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
</div>
        </div>
    

    
@endsection


