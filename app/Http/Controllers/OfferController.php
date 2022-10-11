<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Offer;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offerarray = Offer :: all();
        return view('offer.index', compact('offerarray'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('offer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $string = $request->input('offer_date');
        $arr = explode("-",$string);

        $offerq = new Offer([

            'offer_title' => $request->input('offer_title'),
            'offer_details' => $request->input('offer_detail'),
            'offer_start_date' => $arr[0],
            'offer_end_date' => $arr[1]

        ]);

        $offerq->save();

        return redirect('offer');

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
        $offerarray = Offer :: where('offer_id', $id)->first();
        return view('offer.edit', compact('offerarray'));
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
        $string = $request->get('offer_date');
        $arr = explode("-",$string);

        $offerarray = Offer :: where('offer_id', $id)->first();

        $offerarray->offer_title = $request->get('offer_title');
        $offerarray->offer_details = $request->get('offer_detail');
        $offerarray->offer_start_date = $arr[0];
        $offerarray->offer_end_date = $arr[1];

        $offerarray->save();

        return redirect('offer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $offer = Offer :: find($id);

        $offer->delete();

        return redirect('offer');
    }
}
