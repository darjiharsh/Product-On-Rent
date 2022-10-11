@extends('master.layout')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            
            <div class="card-header">
                <h3 class="card-title">View Offers</h3>
            </div> 

            <div class="card-body">
                
                <table id="example1" class="table table-bordered table-striped">
                
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Offer Title</th>
                            <th>Offer Details</th>
                            <th>Offer Start Date</th>
                            <th>Offer End Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    @foreach ($offerarray as $offer)
                        
                        <tr>
                            <td>1</td>
                            <td>{{$offer->offer_title}}</td>
                            <td>{{$offer->offer_details}}</td>
                            <td>{{$offer->offer_start_date}}</td>
                            <td>{{$offer->offer_end_date}}</td>
                            <td>
                                <a href="{{ route('offer.edit',$offer->offer_id) }}">
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

                                <form action="{{ route('offer.destroy',$offer->offer_id) }}" method="post">

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
                            <th>Offer Title</th>
                            <th>Offer Details</th>
                            <th>Offer Start Date</th>
                            <th>Offer End Date</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>

                </table>
            </div>
        </div>
    </div>
</div>

@endsection