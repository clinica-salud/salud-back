<?php

namespace App\Http\Controllers\Salud;

use App\Http\Controllers\Controller;
use App\Models\Salud\ConsultaOdontograma;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ConsultaController extends Controller
{
    public function getConsultations(Request $request)
    {
        $fecha_desde = $request->fecha_desde;
        $fecha_hasta = $request->fecha_hasta;
        $paciente = $request->paciente;
        $estadoid = $request->estadoid;

        $paciente = strtoupper($paciente);

        $results = DB::table('salud.consulta as c')
            ->select(
                'c.consultaid',
                'cc.citaid',
                'cc.fecha',
                'cc.hora',
                DB::raw("(SELECT CONCAT(pn.nombre, ' ', pn.ape_pat, ' ', pn.ape_mat) FROM basic.persona_natural pn WHERE pn.personaid = cc.pacienteid) as paciente"),
                DB::raw("(SELECT CONCAT(pn2.nombre, ' ', pn2.ape_pat, ' ', pn2.ape_mat) FROM basic.persona_natural pn2 WHERE pn2.personaid = cc.medicoid) as medico"),
                'e.nombre as especialidad',
                'e2.nombre as edificio',
                'ec.nombre as estado',
                'ec.abreviatura as estado_abreviatura'
            )
            ->join('salud.cita as cc', 'cc.citaid', '=', 'c.citaid')
            ->join('salud.medico as m', 'm.medicoid', '=', 'cc.medicoid')
            ->join('salud.especialidad as e', 'e.especialidadid', '=', 'cc.especialidadid')
            ->join('basic.edificio as e2', 'e2.edificioid', '=', 'cc.edificioid')
            ->join('salud.estado_cita as ec', 'ec.estadoid', '=', 'cc.estadoid')
            ->join('basic.persona_natural as pn', 'pn.personaid', '=', 'cc.pacienteid')
            ->join('basic.personaid as p', 'p.personaid', '=', 'pn.personaid');

        if ($fecha_desde && $fecha_hasta) {
            $results = $results->whereBetween('cc.fecha', [$fecha_desde, $fecha_hasta]);
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

    public function getOdontogramConsultation($consultaid)
    {
        $consulta = DB::table('salud.consulta as c')
            ->select(
                'c.consultaid',
                'c.anamnesis',
                'cc.citaid',
                'cc.pacienteid',
                'cc.fecha',
                'cc.observacion',
                'pn.ape_pat as paciente_ape_pat',
                'pn.ape_mat as paciente_ape_mat',
                'pn.nombre as paciente_nombre',
                'pn.sexo',
                'pn.nacimiento',
                'pn2.ape_pat as medico_ape_pat',
                'pn2.ape_mat as medico_ape_mat',
                'pn2.nombre as medico_nombre',
            )
            ->join('salud.cita as cc', 'cc.citaid', '=', 'c.citaid')
            ->join('basic.persona_natural as pn', 'pn.personaid', '=', 'cc.pacienteid')
            ->join('basic.persona_natural as pn2', 'pn2.personaid', '=', 'cc.medicoid')
            ->where('c.consultaid', '=', $consultaid)
            ->first();

        $results = DB::table('salud.consulta_odontograma as co')
            ->select(
                'co.consultaid',
                'co.piezaid',
                'co.detalle',
                'co.observacion',
                'onp.numero as pieza_numero',
                'onp.fila as pieza_fila',
                'tt.nombre as tipo_tratamiento',
                'tc.nombre as tipo_cara',
                'co.es_tratamiento'
            )
            ->join('salud.odontograma_numero_pieza as onp', 'onp.piezaid', '=', 'co.piezaid')
            ->join('salud.tipo_tratamiento as tt', 'tt.tipotratamientoid', '=', 'co.tipotratamientoid')
            ->join('salud.consulta as c', 'c.consultaid', '=', 'co.consultaid')
            ->leftJoin('salud.tipo_cara as tc', 'tc.tipocaraid', '=', 'co.tipocaraid')
            ->where('co.consultaid', '=', $consultaid)
            ->get();

        return response()->json([
            "status" => true,
            "message" => "success",
            "data" => [
                'consulta' => $consulta,
                'piezas' => $results
            ]
        ]);
    }

    public function addOdontogramConsultation(Request $request, $consultaid)
    {
        $validated = $request->validate([
            'piezaid' => 'required|numeric',
            'tipotratamientoid' => 'required|numeric',
            'tipocaraid' => 'nullable|numeric',
            'es_tratamiento' => 'required|boolean',
            'observacion' => 'nullable|string',
            'imagen' => 'nullable|string',
        ]);

        $validated['consultaid'] = $consultaid;

        DB::beginTransaction();
        try {
            ConsultaOdontograma::create($validated);
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
            "message" => "Odontogram consultation registered successfully",
            "data" => []
        ]);
    }

    public function patchOdontogramConsultation(Request $request, $consultaid, $piezaid)
    {
        $validated = $request->validate([
            'es_tratamiento' => 'required|boolean',
        ]);

        DB::beginTransaction();
        try {
            $consultaOdontograma = ConsultaOdontograma::where('consultaid', $consultaid)
                ->where('piezaid', $piezaid)
                ->firstOrFail();

            $consultaOdontograma->update($validated);

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
            "message" => "Odontogram consultation updated successfully",
            "data" => []
        ]);
    }

    public function deleteOdontogramConsultation($consultaid, $piezaid)
    {
        DB::beginTransaction();
        try {
            $consultaOdontograma = ConsultaOdontograma::where('consultaid', $consultaid)
                ->where('piezaid', $piezaid)
                ->firstOrFail();

            $consultaOdontograma->delete();
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
            "message" => "Odontogram consultation deleted successfully",
            "data" => []
        ]);
    }
}
