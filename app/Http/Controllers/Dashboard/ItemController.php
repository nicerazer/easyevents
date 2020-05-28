<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Dashboard\AbstractDashboardClass;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemController extends AbstractDashboardClass {
    protected function getModel($id) {
        return Item::findOrFail($id);
    }
    protected function getModels($paginate_value, $query, $order) {
        return Item::orderBy($query, $order)->paginate($paginate_value);
    }
    protected function collectRelatedModels(Request $request) {
        return [];
    }
    protected function queryPaginateModels(Request $request) {
        return [];
    }
    protected function storeModel(Request $request) {
        $item = Item::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
        ]);
        if($request->file('img') && $request->file('img')->getPathname() != '') {
            $item->img_path = $request->file('img')->store('public/img/items/'.$item->item_id);
        }
        $item->save();
        return $item;
    }
    protected function updateModel(Request $request, $model) {
        $model->name = $request->name;
        $model->description = $request->description;
        $model->price = $request->price;
        if($request->file('img') && $request->file('img')->getPathname() != '') {
            if($model->img_path && Storage::url($model->img_path)) { // Image existence in db & storage
                Storage::delete($model->img_path);
            }
            $model->img_path = $request->file('img')->store('public/img/items/'.$model->item_id);
        }
        $model->save();
        return $model;
    }
    protected function deleteModel($model) {
        if($model->img_path && Storage::url($model->img_path)) { // Image existence in db & storage
            Storage::delete($model->img_path);
        }
        return $model->delete();
    }
    protected function getModelCount() {
        return Item::count();
    }
    protected $model_alias = "item";
    protected $model_attribute_aliases = [
        'item id','name', 'description', 'price', 'created at', 'updated at'
    ];
}
