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
        // Query: Key
        $query_key_raw = array_key_exists('key',$request->query()) && $request->query()['key'] !== null ? $request->query()['key'] : $this->model_attribute_aliases[0]; // Has key 'key', not NULL
        $query_key_snake_case = str_replace(' ', '_', $query_key_raw);
        $query_key_upper_case = Str::of($query_key_raw)->title();
        // Query: Sort
        $query_order = array_key_exists('sort',$request->query()) && $request->query()['sort'] !== null ? $request->query()['sort'] : 'asc'; // Has key 'sort', not NULL

        // Navigation's sorting details (asc / desc)
        $sorting_details = array();
        foreach ($this->model_attribute_aliases as $val) {
            if(
                $query_key_raw == $val &&
                $query_order == 'asc'
            )
                $sorting_details[$val] = 'desc';
            else
                $sorting_details[$val] = 'asc';
        }

        return view("pages.dashboard.$this->model_alias.index", [
            $this->modelAliasPlural() => $this->getModels(5, $query_key_snake_case, $query_order), // Collect and pass model
            'query_title' => $query_key_upper_case, // Current querying title
            'sorting_details' => $sorting_details, // The sorting details whether ascending or descending
            'model_attributes' => $this->model_attribute_aliases, // Available attributes / model-columns for sorting
            'model_count' => $this->getModelCount(),
        ]);
    }

    public function create() {
    }
    public function store() {
        return '';
    }

    public function show($id) {
        return view("pages.dashboard.$this->model_alias.show", [$this->model_alias => $this->getModel($id)]);
    }

    public function update() {}
    public function destroy() {}
}
