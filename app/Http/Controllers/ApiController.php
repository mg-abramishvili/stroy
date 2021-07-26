<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function types()
    {
        return Type::all();
    }
}
