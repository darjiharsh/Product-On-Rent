@extends('master.layout')

@section('content')

<form action="{{ route('vendor.update',$vendorarray->vendor_id) }}" method="post" enctype="multipart/form-data">
    
    @csrf
    @method('PATCH')
    
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Add Vendor</h3>
                            </div>
                            <div class="card-body">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Username" name="vendor_name" value="{{ $vendorarray->vendor_name }}">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    </div>
                                    <input type="email" class="form-control" placeholder="Email" name="vendor_mail" value="{{ $vendorarray->vendor_email }}">
                                </div>

                                {{-- <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-key"></i></span>
                                    </div>
                                    <input type="password" class="form-control" placeholder="Password" name="vendor_pass">
                                </div> --}}


                                <div class="row">   
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <input type="radio" name="r1" value="male" @if($vendorarray->vendor_gender == "male") {{'checked'}} @endif>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" value="Male" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <input type="radio" name="r1" value="female" @if($vendorarray->vendor_gender == "female") {{'checked'}} @endif>
                                                </span>
                                            </div>  
                                            <input type="text" class="form-control" value="Female" readonly>
                                        </div>
                                    </div>
                                </div><br>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-address-card"></i></span>
                                    </div>
                                <textarea class="form-control" rows="3" placeholder="Enter ..." name="vendor_add">{{ $vendorarray->vendor_address }}</textarea>
                                </div>
                                {{-- <div class="custom-file">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                    <input type="file" class="custom-file-input" id="customFile" name="vendor_img" >
                                </div> --}}
                                <hr>
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