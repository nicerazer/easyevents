<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Dashboard\AbstractDashboardClass;
use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookingController extends AbstractDashboardClass {
    protected function getModel($id) {
        return Booking::find($id);
    }
    protected function getModels($paginate_value, $query, $order) {
        return Booking::orderBy($query, $order)->paginate($paginate_value);
    }
    protected function updateModel(Request $request, $model) {
        $model->quantity = $request->quantity;
        $model->date = Carbon::parse($request->date);
        return $model->save();
    }
    protected function deleteModel($model) {
        return $model->delete();
    }
    protected function getModelCount() {
        return Booking::count();
    }
    protected $model_alias = "booking";
    protected $model_attribute_aliases = [
        // 'customer\'s name', 'item', 'quantity', 'date', 'created at'
        'quantity', 'date', 'created at'
    ];
}
