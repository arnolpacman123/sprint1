<?php

namespace App\Http\Controllers;

use App\Models\Pregunta;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PreguntaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $preguntas = Pregunta::with('opciones')->get();

        $response = [
            'preguntas' => $preguntas
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
        $response = Pregunta::create([
            'enunciado' => $request->input('enunciado'),
            'tipo' => $request->input('tipo'),
            'seccion_id' => $request->input('seccion_id'),
        ]);

        return response($response, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function show(Pregunta $pregunta)
    {
        $response = [
            'pregunta' => $pregunta,
        ];

        return response($response, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pregunta $pregunta)
    {
        $pregunta->update([
            'enunciado' => $request->input('enunciado') ? $request->input('enunciado') : $pregunta->enunciado,
            'tipo' => $request->input('tipo') ? $request->input('tipo') : $pregunta->tipo,
        ]);

        $response = [
            'pregunta' => $pregunta,
        ];

        return response($response, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pregunta $pregunta)
    {
        $pregunta->update([
            'estado' => 0,
        ]);

        $response = [
            'pregunta' => $pregunta
        ];

        return response($response, Response::HTTP_OK);
    }
}
