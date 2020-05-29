<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Fetch customer with 'name' query constraints
        $query_customer_name = $request->query('customer%name') ?? '';
        $customers = Customer::where('first_name', 'like', '%'.$query_customer_name.'%')
            ->orderBy('first_name')
            ->paginate(10);

        return view('pages.customer.index', [
            'customers' => $customers,
            'filter_customer_name'=>$request->input('customer%name')]
        );
    }

    public function show($id) {
        try {
            $customer = Customer::findOrFail($id);
        } catch (ModelNotFoundException $exception) {
            return back()->withErrors($exception->getMessage())->withInput();
        }
        return view('pages/customer.show', ['customer' => $customer]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer = new Customer;

        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->phone_number = $request->phone_number;

        $customer->save();

        return redirect()->route('customers.index', $customer)->with('status', 'success');
    }

    /**
     * Show the form for editing a given resource.
     */
    public function edit($id)
    {
        try {
            $customer = Customer::findOrFail($id);
        } catch (ModelNotFoundException $exception) {
            return back()->withErrors($exception->getMessage())->withInput();
        }
        return view('pages.customer.edit', ['customer'=>$customer]);
    }

    /**
     * Update the resource
     */
    public function update(Request $request, $id)
    {
        try {
            $customer = Customer::findOrFail($id);
        } catch (ModelNotFoundException $exception) {
            return back()->withErrors($exception->getMessage())->withInput();
        }

        // Append from input to model
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->phone_number = $request->phone_number;

        $customer->save();

        return redirect()->route('customers.show', $customer)->with('status','success');
    }
}
