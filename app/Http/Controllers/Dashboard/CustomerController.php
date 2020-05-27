<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Dashboard\AbstractDashboardClass;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CustomerController extends AbstractDashboardClass {
    protected function getModel($id) {
        return Customer::findOrFail($id);
    }
    protected function getModels($paginate_value, $query, $order) {
        return Customer::orderBy($query, $order)->paginate($paginate_value);
    }
    protected function collectRelatedModels(Request $request) {
        return [];
    }
    protected function queryPaginateModels(Request $request) {
        return [];
    }
    protected function storeModel(Request $request) {
        return Customer::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone_number' => $request->phone_number,
        ]);
    }
    protected function updateModel(Request $request, $model) {
        $model->first_name = $request->first_name;
        $model->last_name = $request->last_name;
        $model->phone_number = $request->phone_number;
        return $model->save();
    }
    protected function deleteModel($model) {
        return $model->delete();
    }
    protected function getModelCount() {
        return Customer::count();
    }
    protected $model_alias = "customer";
    protected $model_attribute_aliases = [
        'customer id','first name', 'last name', 'created at'
    ];
}
