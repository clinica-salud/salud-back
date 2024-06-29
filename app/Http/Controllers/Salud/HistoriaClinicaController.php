<?php

namespace App\Http\Controllers\Salud;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistoriaClinicaController extends Controller
{
    public function getClinicalHistory(Request $request)
    {
        $fecha_desde = $request->fecha_desde;
        $fecha_hasta = $request->fecha_hasta;
        $edificioid = $request->edificioid;
        $especialidadid = $request->especialidadid;
        $medicoid = $request->medicoid;
        $paciente = $request->paciente;
        $estadoid = $request->estadoid;

        $paciente = strtoupper($paciente);

        $results = DB::table('salud.consulta as c')
            ->select(
                'c.consultaid',
                'cc.citaid',
                'cc.fecha',
                'e2.nombre as edificio',
                'e.nombre as especialidad',
                DB::raw("(SELECT CONCAT(pn.nombre, ' ', pn.ape_pat, ' ', pn.ape_mat) FROM basic.persona_natural pn WHERE pn.personaid = cc.pacienteid) as paciente"),
                DB::raw("(SELECT CONCAT(pn2.nombre, ' ', pn2.ape_pat, ' ', pn2.ape_mat) FROM basic.persona_natural pn2 WHERE pn2.personaid = cc.medicoid) as medico"),
                'e.nombre as especialidad',
                'e2.nombre as edificio',
                'ec.nombre as estado',
                'ec.abreviatura as estado_abreviatura'
            )
            ->join('salud.cita as cc', 'cc.citaid', '=', 'c.citaid')
            ->join('salud.consulta_odontograma as co', 'co.consultaid', '=', 'c.consultaid')
            ->join('salud.medico as m', 'm.medicoid', '=', 'cc.medicoid')
            ->join('salud.especialidad as e', 'e.especialidadid', '=', 'cc.especialidadid')
            ->join('salud.estado_cita as ec', 'ec.estadoid', '=', 'cc.estadoid')
            ->join('basic.edificio as e2', 'e2.edificioid', '=', 'cc.edificioid')
            ->join('basic.persona_natural as pn', 'pn.personaid', '=', 'cc.pacienteid')
            ->join('basic.personaid as p', 'p.personaid', '=', 'pn.personaid')
            ->distinct();

        if ($fecha_desde && $fecha_hasta) {
            $results = $results->whereBetween('cc.fecha', [$fecha_desde, $fecha_hasta]);
        }

        if ($edificioid) {
            $results = $results->where('cc.edificioid', $edificioid);
        }

        if ($especialidadid) {
            $results = $results->where('cc.especialidadid', $especialidadid);
        }

        if ($medicoid) {
            $results = $results->where('cc.medicoid', $medicoid);
        }

        if ($estadoid) {
            $results = $results->where('cc.estadoid', $estadoid);
        }

        if ($paciente) {
            $results = $results
                ->whereRaw("upper(replace(coalesce(pn.ape_pat,'') || coalesce(pn.ape_mat,'') || coalesce(pn.nombre, ''),' ', '')) like upper(replace('%$paciente%',' ',''))")
                ->orWhereRaw("upper(replace(coalesce(pn.nombre,'') || coalesce(pn.ape_pat,'') || coalesce(pn.ape_mat, ''),' ', '')) like upper(replace('%$paciente%',' ',''))")
                ->orWhereRaw("upper(p.numero) like upper(replace('%$paciente%',' ',''))");
        }

        $results = $results->orderBy('c.consultaid', 'desc')->get();

        return response()->json([
            "status" => true,
            "message" => "success",
            "data" => $results
        ]);
    }
}
