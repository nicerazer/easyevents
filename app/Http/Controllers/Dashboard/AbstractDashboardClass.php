<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

abstract class AbstractDashboardClass extends Controller
{
    // Model Methods
    abstract protected function getModels($paginate_value);
    // Model Attributes
    protected $model_alias;
    protected $model_attribute_aliases; // Please use single quotes and escape any special characters
    // Mutator Methods
    protected function modelAliasPlural() {
        return Str::of($this->model_alias)->plural()->__toString();
    }

    public function index(Request $request) {
        $query_title_raw = str_replace('_', ' ', key((array)$request->query()));
        $query_title = Str::of($query_title_raw)->title();

        $sorting_details = array();
        foreach ($this->model_attribute_aliases as $val) {
            if(
                $query_title_raw == $val &&
                current((array)$request->query()) == 'ascending'
            )
                $sorting_details[$val] = 'descending';
            else
                $sorting_details[$val] = 'ascending';
        }

        return view("pages.dashboard.$this->model_alias.index", [
            $this->modelAliasPlural() => $this->getModels(5), // Collect and pass model
            'query_title' => $query_title, // Current querying title
            'sorting_details' => $sorting_details, // The sorting details whether ascending or descending
            'model_attributes' => $this->model_attribute_aliases, // Attributes or model available columns
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
