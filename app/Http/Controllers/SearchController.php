<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class BookingSearchController extends Controller
{
    /**
     * Show the form for searching a specified resource
     *
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        return view('pages.search.form');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $booking = Booking::findOrFail($id);
        } catch (ModelNotFoundException $exception) {
            return back()->withErrors($exception->getMessage())->withInput();
        }
        return view('pages.search.show', ['booking' => $booking]);
    }
}
