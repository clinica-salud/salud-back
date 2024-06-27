<?php

namespace App\Http\Controllers\Salud;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SetupController extends Controller
{
    public function getMedicos()
    {
        $results = DB::table('salud.medico as m')
            ->select(
                'm.medicoid',
                DB::raw("(SELECT CONCAT(pn.nombre, ' ', pn.ape_pat, ' ', pn.ape_mat) FROM basic.persona_natural pn WHERE pn.personaid = m.medicoid) as nombre_completo"),
                'e.nombre as especialidad'
            )
            ->join('salud.medico_especialidad as me', 'me.medicoid', '=', 'm.medicoid')
            ->join('salud.especialidad as e', 'e.especialidadid', '=', 'me.especialidadid')
            ->get();

        return response()->json([
            "status" => true,
            "message" => "success",
            "data" => $results
        ]);
    }

    public function getTiposServicio()
    {
        $results = DB::table('salud.tipo_servicio as ts')
            ->select(
                'ts.tiposervicioid',
                'ts.nombre',
                'ts.abreviatura'
            )
            ->where('ts.estado', true)
            ->orderBy('ts.tiposervicioid')
            ->get();

        return response()->json([
            "status" => true,
            "message" => "success",
            "data" => $results
        ]);
    }

    public function getTiposEspecialidad()
    {
        $results = DB::table('salud.especialidad as e')
            ->select(
                'e.especialidadid',
                'e.nombre',
                'e.nombre_corto'
            )
            ->where('e.estado', true)
            ->get();

        return response()->json([
            "status" => true,
            "message" => "success",
            "data" => $results
        ]);
    }

    public function getTiposTratamiento()
    {
        $results = DB::table('salud.tipo_tratamiento as tt')
            ->select(
                'tt.tipotratamientoid',
                'tt.nombre',
                'tt.abreviatura'
            )
            ->where('tt.estado', true)
            ->get();

        return response()->json([
            "status" => true,
            "message" => "success",
            "data" => $results
        ]);
    }

    public function getCosto(Request $request)
    {
        $tiposervicioid = $request->tiposervicioid;
        $medicoid = $request->medicoid;
        $especialidadid = $request->especialidadid;

        $results = DB::table('salud.costo as c')
            ->select(
                'c.costoid',
                'c.costo',
                'c.tiposervicioid',
                'c.medicoid',
                'c.especialidadid',
            )
            ->where('c.tiposervicioid', $tiposervicioid)
            ->where('c.medicoid', $medicoid)
            ->where('c.especialidadid', $especialidadid)
            ->first();

        return response()->json([
            "status" => true,
            "message" => "success",
            "data" => $results
        ]);
    }
}
