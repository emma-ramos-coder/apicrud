<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotaRequest;
use Illuminate\Http\Request;
use App\Models\Nota;
use Illuminate\Http\JsonResponse;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():JsonResponse
    {
        $notas = Nota::all();
        // el valor que se va a devolver ees en formato JSON
        // el estado 200 significa que todo ha sido correcto
        return response()->json($notas,200);
    }
    
    public function store(NotaRequest $request):JsonResponse
    {
        Nota::create($request->all());
        // el estatus 201 significa que el proceso de creación fue correcto
        return response()->json(['sucess' => true], 201);
    }
    
    public function show(string $id):JsonResponse
    {
        $nota = Nota::find($id);
        return response()->json($nota,200);
    }
    
    public function update(NotaRequest $request, string $id):JsonResponse
    {
        $nota = Nota::find($id); 
        $nota->titulo = $request->titulo;
        $nota->contenido = $request->contenido;
        $nota->save();
        return response()->json(['sucess' => true], 200);
    }
    
    public function destroy(string $id):JsonResponse
    {
        Nota::find($id)->delete();
        return response()->json(['sucess' => true], 200);
    }
}
