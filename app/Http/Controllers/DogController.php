<?php

namespace App\Http\Controllers;

use App\Models\Dog;

use Illuminate\Http\Request;

class DogController extends Controller
{
    public function index()
    {
        $dogs = Dog::all();
        return response()->json($dogs,200);
    }
}
