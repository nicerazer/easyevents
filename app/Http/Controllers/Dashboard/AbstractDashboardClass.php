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

    // Helper Methods
    private function getTableFields() {
        $tableName = $this->modelAliasPlural();

        $table_fields = DB::table('information_schema.columns')
            ->select(['COLUMN_NAME as name', 'DATA_TYPE as type'])
            ->where('table_name', $tableName)
            ->get()
            ->pluck('type', 'name');
        foreach ($table_fields as $key => $value) {
            if($value == "bigint") {
                $table_fields[$key] = "int";
            }
        }
        return $table_fields;
    }

    public function index(Request $request) {
        return view("pages.dashboard.$this->model_alias.index", [
            // Collect and pass model
            $this->modelAliasPlural() => $this->getModels(5),
            // Find the selected schemas available column
            'table_fields' => $this->getTableFields(),
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
