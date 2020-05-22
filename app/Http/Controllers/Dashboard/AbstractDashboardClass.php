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
    // Mutator Methods
    protected function modelAliasPlural() {
        return Str::of($this->model_alias)->plural()->__toString();
    }

    public function index(Request $request) {
        return view("pages.dashboard.$this->model_alias.index", [
            // Collect and pass model
            $this->modelAliasPlural() => $this->getModels(5),
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
