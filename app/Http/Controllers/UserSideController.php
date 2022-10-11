<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Booking;
use App\Cart;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UserSideController extends Controller
{
    public function index()
    {
        $productarray = Product :: all();

        $cartarray = Cart :: join('products','carts.product_id','=','products.product_id')
                            ->select('carts.*','products.*')->get();

        return view('user.index', compact('productarray','cartarray'));
    }

    public function booking($id, $cost, $qty)
    {   
        $arr = array($id,$cost);
        $string = join("",$arr);

        $newstring = explode(" ",$string);

        $quantity = $qty;

        $cartarray = Cart :: join('products','carts.product_id','=','products.product_id')
                            ->select('carts.*','products.*')->get();

        return view('booking.create', compact('newstring','cartarray','quantity'));
    }

    public function bookinfo(Request $res, $id)
    {
        $status = "pending";
        $amt = $res->input('qty') * $res->input('price');

        $bookq = new Booking([

            'booking_status' => $status,
            'booking_amount' => $amt,
            'booking_address' => $res->input('add'),
            'product_id' => $id

        ]);

        $bookq->save();
        
        return redirect('userr');

    }

    public function addtocart($id)
    {
        $user_id = "1";
        $product_qty = "1";

        $cartq = new Cart([

            'product_id' => $id,
            'product_qty' => $product_qty,
            'user_id' => $user_id

        ]);

        $cartq->save();

        return redirect('userr');
    }

    public function cartupdate(Request $req, $id)
    {
        $cartq = Cart :: where('cart_id', $id)->first();

        $cartq->product_qty = $req->get('qty');

        $cartq->save();

        return redirect('userr');
    }

    public function cartremove($id)
    {
        $cartq = Cart :: find($id);

        $cartq->delete();

        return redirect('userr');
    }
}
