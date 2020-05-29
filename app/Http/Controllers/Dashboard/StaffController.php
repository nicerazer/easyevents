<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Dashboard\AbstractDashboardClass;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StaffController extends AbstractDashboardClass {
    protected function getModel($id) {
        return Staff::findOrFail($id);
    }
    protected function getModels($paginate_value, $query, $order) {
        return Staff::orderBy($query, $order)->paginate($paginate_value);
    }
    protected function collectRelatedModels(Request $request) {
        return [];
    }
    protected function queryPaginateModels(Request $request) {
        return [];
    }
    protected function storeModel(Request $request) {
        $staff = Staff::create([
            'username' => $request->username,
            'email' => $request->email,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone_number' => $request->phone_number,
        ]);
        $staff->password = Hash::make($request->password);
        $staff->save();
        return $staff;
    }
    protected function updateModel(Request $request, $model) {
        $model->username = $request->username;
        $model->first_name = $request->first_name;
        $model->last_name = $request->last_name;
        $model->phone_number = $request->phone_number;
        if($request->password !== '') {
            $model->password = Hash::make($request->password);
        }
        $model->save();
        return $model;
    }
    protected function deleteModel($model) {
        return $model->delete();
    }
    protected function getModelCount() {
        return Staff::count();
    }
    protected $model_alias = "staff";
    protected $model_attribute_aliases = [
        'staff id', 'username', 'first name', 'last name', 'phone number', 'email', 'created at', 'updated at'
    ];
}
