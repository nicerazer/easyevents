<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

abstract class AbstractDashboardClass extends Controller
{
    // Model Methods
    abstract protected function getModels($paginate_value, $query, $order);
    abstract protected function getModelCount();
    // Model Attributes
    protected $model_alias;
    protected $model_attribute_aliases; // Please use single quotes and escape any special characters
    // Mutator Methods
    protected function modelAliasPlural() {
        return Str::of($this->model_alias)->plural()->__toString();
    }

    public function index(Request $request) {
        $query_title_raw = key((array)$request->query());
        $query_title_whitespace = str_replace('_', ' ', Str::of($query_title_raw)->title());
        $query_title_uppercase = Str::of($query_title_whitespace)->title();
        $query_order = current((array)$request->query());

        $sorting_details = array();
        foreach ($this->model_attribute_aliases as $val) {
            if(
                $query_title_raw == $val &&
                $query_order == 'asc'
            )
                $sorting_details[$val] = 'desc';
            else
                $sorting_details[$val] = 'asc';
        }

        return view("pages.dashboard.$this->model_alias.index", [
            $this->modelAliasPlural() => $this->getModels(5, $query_title_raw, $query_order), // Collect and pass model
            'query_title' => $query_title_uppercase, // Current querying title
            'sorting_details' => $sorting_details, // The sorting details whether ascending or descending
            'model_attributes' => $this->model_attribute_aliases, // Attributes or model available columns
            'model_count' => $this->getModelCount(),
        ]);
    }
    public function show() {
    }
    public function create() {
    }
    public function store() {
        return '';
    }
    public function edit() {}
    public function update() {}
    public function destroy() {}
}
