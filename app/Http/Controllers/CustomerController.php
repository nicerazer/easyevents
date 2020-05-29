<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function find(Request $request) {
        try {
            $customer = Customer::where('first_name', $request->first_name)
            ->where('last_name', $request->last_name)
            ->where('phone_number', $request->phone_number)
            ->firstOrFail();
        } catch (ModelNotFoundException $exception) {
            return back()->withErrors($exception->getMessage())->withInput();
        }
        return redirect()->route('customers.show', $customer);
    }

    public function show($id) {
        try {
            $customer = Customer::findOrFail($id);
        } catch (ModelNotFoundException $exception) {
            return back()->withErrors($exception->getMessage())->withInput();
        }
        return view('pages/customer.show', ['customer' => $customer]);
    }

    public function create()
    {
        return view('pages.customer.create');
    }

    public function store(Request $request)
    {
        $customer = new Customer;

        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->phone_number = $request->phone_number;

        $customer->save();

        return redirect()->route('customers.show', $customer)->with('status', 'success');
    }

    public function edit($id)
    {
        try {
            $customer = Customer::findOrFail($id);
        } catch (ModelNotFoundException $exception) {
            return back()->withErrors($exception->getMessage())->withInput();
        }
        return view('pages.customer.edit', ['customer'=>$customer]);
    }

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
