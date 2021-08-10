<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Roof;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function types() {
        return Type::all();
    }

    public function types_score(Request $request) {
        $data = request()->all();
        $type = Type::find($data['id']);
        $type->score = $data['score'];
        $type->save();
    }

    public function roofs() {
        return Roof::all();
    }

    public function roofs_score(Request $request) {
        $data = request()->all();
        $roof = Roof::find($data['id']);
        $roof->score = $data['score'];
        $roof->save();
    }
}
