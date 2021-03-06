<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

abstract class AbstractDashboardClass extends Controller
{
    // Abstract Model Methods : Get
    abstract protected function getModel($id);
    abstract protected function getModels($paginate_value, $query, $order);
    abstract protected function getModelCount();
    abstract protected function collectRelatedModels(Request $request); // Collect all the related models
    abstract protected function queryPaginateModels(Request $request); // Creates an array of queries for related models
    // Abstract Model Methods : Mutators
    abstract protected function storeModel(Request $request);
    abstract protected function updateModel(Request $request, $model); // Requires a model as the parameter
    abstract protected function deleteModel($model); // Requires a model as the parameter

    // Model Attributes
    protected $model_alias;
    protected $model_attribute_aliases; // Please use single quotes and escape any special characters
    // Accessor Methods
    protected function getModelErrorHandled($id) {
        try {
            $model = $this->getModel($id);
        } catch (ModelNotFoundException $exception) {
            return $exception;
        }
        return $model;
    }
    // Processor Methods
    protected function modelAliasPlural() {
        return Str::of($this->model_alias)->plural()->__toString();
    }

    /**
     * Extract The Specified Query
     *
     * @param  \Illuminate\Http\Request  $request
     * @param String $key
     * @param String $default
     * @return String A single specified query
     */
    protected function queryExtract(Request $request, $key, $default) {
        return array_key_exists($key,$request->query()) && $request->query()[$key] !== null ? $request->query()[$key] : $default; // Has key $key, not NULL
    }

    public function index(Request $request) {
        // Query: Key
        $query_key_raw = $this->queryExtract($request,'key',$this->model_attribute_aliases[0]);
        $query_key_snake_case = str_replace(' ', '_', $query_key_raw);
        $query_key_upper_case = Str::of($query_key_raw)->title();
        // Query: Sort
        $query_order = $this->queryExtract($request, 'sort', 'asc'); // Has key 'sort', not NULL

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

    public function create(Request $request) {
        return view("pages.dashboard.$this->model_alias.create", array_merge($this->collectRelatedModels($request), $this->queryPaginateModels($request)));
    }

    public function store(Request $request) {
        $model = $this->storeModel($request);
        return redirect()->route('dashboard.'.$this->modelAliasPlural().'.show', $model);
    }

    public function show($id) {
        $model = $this->getModelErrorHandled($id);
        if($model instanceof ModelNotFoundException) {
            return redirect()->route('dashboard.'.$this->modelAliasPlural().'.index')->withErrors($model->getMessage())->withInput();
        }
        return view("pages.dashboard.$this->model_alias.show", [$this->model_alias => $model]);
    }

    public function update(Request $request, $id) {
        $model = $this->getModelErrorHandled($id);
        if($model instanceof ModelNotFoundException) {
            return redirect()->route('dashboard.'.$this->modelAliasPlural().'.index')->withErrors($model->getMessage())->withInput();
        }
        $model = $this->updateModel($request, $model);
        // TODO: Flash messages
        return redirect()->route("dashboard.".$this->modelAliasPlural().".show", $id);
    }

    public function destroy($id) {
        $model = $this->getModelErrorHandled($id);
        if($model instanceof ModelNotFoundException) {
            return redirect()->route('dashboard.'.$this->modelAliasPlural().'.index')->withErrors($model->getMessage())->withInput();
        }
        $model = $this->deleteModel($model);
        // TODO: Flash messages
        return redirect()->route("dashboard.".$this->modelAliasPlural().".index");
    }
}
