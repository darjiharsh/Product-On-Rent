@extends('master.layout')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-header">
                <h3 class="card-title">View Category</h3>
            </div>

            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Vendor Name</th>
                            <th>Vendor Email</th>
                            <th>Vendor Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    @foreach ($vendorarray as $vendor)
                        <tr>
                            <td>1</td>
                            <td>{{ $vendor->vendor_name }}</td>
                            <td>{{$vendor->vendor_email}}</td>
                            <td><img src="{{ url('upload/' . $vendor->vendor_image_path) }}" width="50"></td>
                            
                            {{-- <td>
                                <a href="   " data-lightbox="image-1" data-title="Harsh Darji">
                                    <img src="{{ url('upload/' . $vendor->vendor_image_path) }}" style="width: 50px"/>
                                </a>
                            </td> --}}

                            <td>
                                <a href="{{ route('vendor.edit',$vendor->vendor_id)}}">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fas fa-edit" style="size: 9cm">
                                            Edit
                                        </i>
                                    </button>
                                </a>

                                {{-- <a href="{{ route('category.destroy',$category->category_id) }}">
                                    <button class="btn btn-danger" type="submit">
                                        <i class="fas fa-trash" style="size: 9cm">
                                            DELETE
                                        </i>
                                    </button>
                                </a> --}}

                                <form action="{{ route('vendor.destroy',$vendor->vendor_id) }}" method="post">
                                    
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
                            <th>Vendor Name</th>
                            <th>Vendor Email</th>
                            <th>Vendor Image</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    
                </table>
            </div>
        </div>
    </div>
</div>

@endsection


