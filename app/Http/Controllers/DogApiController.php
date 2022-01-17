<?php

namespace App\Http\Controllers;

use App\Models\Dog;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DogApiController extends Controller
{
    
    //Display a listing of the resource.

    public function index()
    {
        $dogs = Dog::all();
        return response()->json($dogs,200);
    }
    
    //Display the specified resource.

    public function show($id)
    {
        $dog = Dog::where('id',$id)->get();
        //Esto es igual con otros métodos
        //$dog = DB::where('id',$id)->get(); 
        //$dog = Dog::find($id);

        return response()->json($dog,200);
        // Si se hiciera con el find($id), habría que modificar parámetros
        // return response()->json(['dog' => $dog],200); esto si se hiciera con find
    }

    //Store a newly created resource in storage.

    public function store(Request $request)
    {
        $dog = Dog::create($request->all());
        return $dog;
        //return response()->json($dog);       
    }

    //Remove the specified resource from storage.

    public function destroy($id)
    {
        $dog = Dog::destroy($id);
        return response()->json($dog);
    }

    //Update the specified resource in storage.

    public function update(Request $request, $id)
    {
        $dog = Dog::where('id',$id)->update($request->all());
        //return $dog;
        return response()->json($dog);
    }
 
    //Show the form for creating a new resource.

    public function create()
    {        
        //
    }

    //Show the form for editing the specified resource.

    public function edit($id)
    {
        //
    }

    
}
