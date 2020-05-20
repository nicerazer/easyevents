<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\Item;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Show the single resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $booking = Booking::findOrFail($id);
        } catch (ModelNotFoundException $exception) {
            return back()->withErrors($exception->getMessage())->withInput();
        }
        return view('pages.booking.show', ['booking' => Booking::find($id)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($customer_id)
    {
        return view('pages.booking.create', ['items' => Item::get(), 'customer_id' => $customer_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        try {
            $customer = Customer::findOrFail($id);
            $item = Item::findOrFail($request->item_id);
        } catch (ModelNotFoundException $exception) {
            return back()->withErrors($exception->getMessage())->withInput();
        }

        $booking = new Booking;

        $booking->quantity = $request->quantity;
        $booking->customer_id = $customer->customer_id;
        $booking->item_id = $item->item_id;
        $booking->date = Carbon::now();
        // Implement date time picker
        // $booking->date = $request->date;

        $booking->save();

        return redirect()->route('customers.show', $customer)->with('status', 'success');
    }
}
