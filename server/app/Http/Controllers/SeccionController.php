<?php

namespace App\Http\Controllers;

use App\Models\Seccion;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SeccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $secciones = Seccion::with('preguntas.opciones')->get();

        $response = [
            'secciones' => $secciones
        ];

        return response($response, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $seccion = Seccion::create([
            'titulo' => $request->input('titulo'),
            'descripcion' => $request->input('descripcion'),
            'encuesta_id' => $request->input('encuesta_id'),
        ]);

        $response = $seccion;

        return response($response, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Seccion  $seccion
     * @return \Illuminate\Http\Response
     */
    public function show(Seccion $seccion)
    {
        $response = $seccion->load('preguntas.opciones');

        return response($response, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Seccion  $seccion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seccion $seccion)
    {
        $seccion->update([
            'titulo' => $request->input('titulo') ? $request->input('titulo') : $seccion->titulo,
            'descripcion' => $request->input('descripcion') ? $request->input('descripcion') : $seccion->descripcion,
        ]);

        $response = [
            'seccion' => $seccion,
        ];

        return response($response, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Seccion  $seccion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seccion $seccion)
    {
        $seccion->update([
            'estado' => 0,
        ]);

        $response = [
            'seccion' => $seccion
        ];

        return response($response, Response::HTTP_OK);
    }
}
