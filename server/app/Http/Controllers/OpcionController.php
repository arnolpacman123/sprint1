<?php

namespace App\Http\Controllers;

use App\Models\Opcion;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OpcionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $opcion = Opcion::all();

        $response = [
            'opciones' => $opcion
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
        $response = Opcion::create([
            'numero' => $request->input('numero'),
            'valor' => $request->input('valor'),
            'pregunta_id' => $request->input('pregunta_id'),
        ]);

        return response($response, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Opcion  $opcion
     * @return \Illuminate\Http\Response
     */
    public function show(Opcion $opcion)
    {
        $response = [
            'opcion' => $opcion,
        ];

        return response($response, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Opcion  $opcion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Opcion $opcion)
    {
        $opcion->update([
            'numero' => $request->input('numero') ? $request->input('numero') : $opcion->numero,
            'valor' => $request->input('valor') ? $request->input('valor') : $opcion->valor,
        ]);

        $response = [
            'ocp$opcion' => $opcion,
        ];

        return response($response, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Opcion  $opcion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Opcion $opcion)
    {
        $opcion->update([
            'estado' => 0,
        ]);

        $response = [
            'opcion' => $opcion
        ];

        return response($response, Response::HTTP_OK);
    }
}
