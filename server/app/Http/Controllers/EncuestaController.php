<?php

namespace App\Http\Controllers;

use App\Models\Encuesta;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EncuestaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $encuestas = Encuesta::with('secciones.preguntas.opciones')->get();

        $response = [
            'encuestas' => $encuestas
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
        $response = Encuesta::create([
            'titulo' => $request->input('titulo'),
            'descripcion' => $request->input('descripcion'),
        ]);

        return response($response, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Encuesta  $encuesta
     * @return \Illuminate\Http\Response
     */
    public function show(Encuesta $encuesta)
    {   
        $response = $encuesta->load('secciones.preguntas.opciones');

        return response($response, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Encuesta  $encuesta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Encuesta $encuesta)
    {
        $encuesta->update([
            'titulo' => $request->input('titulo') ? $request->input('titulo') : $encuesta->titulo,
            'descripcion' => $request->input('descripcion') ? $request->input('descripcion') : $encuesta->descripcion,
        ]);

        $response = [
            'encuesta' => $encuesta,
        ];

        return response($response, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Encuesta  $encuesta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Encuesta $encuesta)
    {
        $encuesta->update([
            'estado' => 0,
        ]);

        $response = [
            'encuesta' => $encuesta
        ];

        return response($response, Response::HTTP_OK);
    }
}
