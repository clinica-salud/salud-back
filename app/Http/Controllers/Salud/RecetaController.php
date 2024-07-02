<?php

namespace App\Http\Controllers\Salud;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class RecetaController extends Controller
{
    public function getRecipes(Request $request)
    {
        $citaid = $request->citaid;

        $results = DB::table('salud.receta as r')
            ->select(
                'r.recetaid',
                'r.medicamento',
                'r.indicaciones',
                'r.via_administracion',
                'r.dosis',
                'r.frecuencia',
                'r.tiempo',
                'r.cantidad',
                'r.citaid',
            );

        if ($citaid) {
            $results = $results->where('citaid', $citaid);
        }

        $results = $results->get();

        return response()->json([
            "status" => true,
            "message" => "success",
            "data" => $results
        ]);
    }

    public function addRecipe(Request $request)
    {
        $validated = $request->validate([
            'citaid' => 'required|numeric',
            'medicamento' => 'required|string',
            'via_administrativa' => 'required|string',
            'dosis' => 'required|string',
            'frecuencia' => 'required|string',
            'tiempo' => 'required|string',
            'cantidad' => 'required|numeric',
            'indicaciones' => 'required|string',
        ]);

        DB::beginTransaction();
        try {
            DB::table('salud.receta')->insert([
                'citaid' => $validated['citaid'],
                'medicamento' => $validated['medicamento'],
                'via_administracion' => $validated['via_administrativa'],
                'dosis' => $validated['dosis'],
                'frecuencia' => $validated['frecuencia'],
                'tiempo' => $validated['tiempo'],
                'cantidad' => $validated['cantidad'],
                'indicaciones' => $validated['indicaciones'],
                'registro' => Carbon::now(),
                'usuarioid' => 1,
            ]);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
                'data' =>  null
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return response()->json([
            "status" => true,
            "message" => "Recipe registered successfully",
            "data" => []
        ]);
    }

    public function deleteRecipe($recetaid)
    {
        DB::beginTransaction();
        try {
            DB::table('salud.receta')->where('recetaid', $recetaid)->delete();
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
                'data' =>  null
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return response()->json([
            "status" => true,
            "message" => "Recipe deleted successfully",
            "data" => []
        ]);
    }
}
