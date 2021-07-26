<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function types() {
        return Type::all();
    }

    public function score(Request $request) {
        $data = request()->all();
        $type = Type::find($data['id']);
        $type->score = $data['score'];
        $type->save();
    }
}
