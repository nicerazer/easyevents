<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Dashboard\AbstractDashboardClass;
use App\Models\Booking;
use App\Models\Customer;
use App\Models\Item;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookingController extends AbstractDashboardClass {
    protected function getModel($id) {
        return Booking::findOrFail($id);
    }
    protected function getModels($paginate_value, $query, $order) {
        return Booking::orderBy($query, $order)->paginate($paginate_value);
    }
    protected function collectRelatedModels(Request $request) {
        return [
            'customers' => Customer::simplePaginate(20, ['*'], 'paginate_customers'),
            'items' => Item::simplePaginate(20, ['*'], 'paginate_items'),
        ];
    }
    protected function queryPaginateModels(Request $request) {
        $paginate_customers = (int)$this->queryExtract($request, 'paginate_customers', '');
        $paginate_customers = $paginate_customers > 0 ? $paginate_customers : '1';

        $paginate_items = (int)$this->queryExtract($request, 'paginate_items', '');
        $paginate_items = $paginate_items > 0 ? $paginate_items : '1';

        return compact(['paginate_customers', 'paginate_items']);
    }
    protected function storeModel(Request $request) {
        return Booking::create([
            'customer_id' => $request->customer_id,
            'item_id' => $request->item_id,
            'quantity' => $request->quantity,
            'date' => $request->date,
        ]);
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
