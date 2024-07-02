<?php

namespace App\Http\Controllers\Salud;

use App\Http\Controllers\Controller;
use App\Models\Salud\Cita;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CitaController extends Controller
{
    public function getEstados()
    {
        $results = DB::table('salud.estado_cita as ec')
            ->select(
                'ec.estadoid',
                'ec.nombre',
                'ec.abreviatura'
            )
            ->where('ec.estado', true)
            ->get();

        return response()->json([
            "status" => true,
            "message" => "success",
            "data" => $results
        ]);
    }

    public function getCitas(Request $request)
    {
        $fecha_desde = $request->fecha_desde;
        $fecha_hasta = $request->fecha_hasta;
        $medicoid = $request->medicoid;
        $paciente = $request->paciente;
        $estadoid = $request->estadoid;

        $paciente = strtoupper($paciente);

        $results = DB::table('salud.cita as c')
            ->select(
                'c.citaid',
                'c.fecha',
                'c.hora',
                DB::raw("(SELECT CONCAT(pn.nombre, ' ', pn.ape_pat, ' ', pn.ape_mat) FROM basic.persona_natural pn WHERE pn.personaid = c.pacienteid) as paciente"),
                DB::raw("(SELECT CONCAT(pn2.nombre, ' ', pn2.ape_pat, ' ', pn2.ape_mat) FROM basic.persona_natural pn2 WHERE pn2.personaid = c.medicoid) as medico"),
                'e.nombre as especialidad',
                'e2.nombre as edificio',
                'ec.estadoid',
                'ec.nombre as estado',
                'ec.abreviatura as estado_abreviatura',
                'cc.consultaid'
            )
            ->join('salud.medico as m', 'm.medicoid', '=', 'c.medicoid')
            ->join('salud.especialidad as e', 'e.especialidadid', '=', 'c.especialidadid')
            ->join('basic.edificio as e2', 'e2.edificioid', '=', 'c.edificioid')
            ->join('salud.estado_cita as ec', 'ec.estadoid', '=', 'c.estadoid')
            ->join('basic.persona_natural as pn', 'pn.personaid', '=', 'c.pacienteid')
            ->join('basic.personaid as p', 'p.personaid', '=', 'pn.personaid')
            ->join('salud.consulta as cc', 'cc.citaid', '=', 'c.citaid');

        if ($fecha_desde && $fecha_hasta) {
            $results = $results->whereBetween('c.fecha', [$fecha_desde, $fecha_hasta]);
        }

        if ($medicoid) {
            $results = $results->where('c.medicoid', $medicoid);
        }

        if ($estadoid) {
            $results = $results->where('c.estadoid', $estadoid);
        }

        if ($paciente) {
            $results = $results
                ->whereRaw("upper(replace(coalesce(pn.ape_pat,'') || coalesce(pn.ape_mat,'') || coalesce(pn.nombre, ''),' ', '')) like upper(replace('%$paciente%',' ',''))")
                ->orWhereRaw("upper(replace(coalesce(pn.nombre,'') || coalesce(pn.ape_pat,'') || coalesce(pn.ape_mat, ''),' ', '')) like upper(replace('%$paciente%',' ',''))")
                ->orWhereRaw("upper(p.numero) like upper(replace('%$paciente%',' ',''))");
        }

        $results = $results
            ->orderBy('c.citaid', 'desc')
            ->get();

        return response()->json([
            "status" => true,
            "message" => "success",
            "data" => $results
        ]);
    }

    public function getCitaById($citaid)
    {
        $results = DB::table('salud.cita as c')
            ->select(
                'c.citaid',
                'co.consultaid',
                'c.pacienteid',
                'p.numero as dni_paciente',
                'pn.ape_pat as ape_pat_paciente',
                'pn.ape_mat as ape_mat_paciente',
                'pn.nombre as nombre_paciente',
                'c.medicoid',
                'pn2.ape_pat as ape_pat_medico',
                'pn2.ape_mat as ape_mat_medico',
                'pn2.nombre as nombre_medico',
                'c.tiposervicioid',
                'ts.nombre as tipo_servicio',
                'c.especialidadid',
                'e.nombre as especialidad',
                'c.edificioid',
                'e2.nombre as edificio',
                'c.fecha',
                'c.hora',
                'c.costo',
                'c.observacion',
                'c.estadoid',
                'ec.nombre as estado',
            )
            ->join('basic.persona_natural as pn', 'pn.personaid', '=', 'c.pacienteid')
            ->join('basic.persona_natural as pn2', 'pn2.personaid', '=', 'c.medicoid')
            ->join('salud.tipo_servicio as ts', 'ts.tiposervicioid', '=', 'c.tiposervicioid')
            ->join('salud.especialidad as e', 'e.especialidadid', '=', 'c.especialidadid')
            ->join('basic.edificio as e2', 'e2.edificioid', '=', 'c.edificioid')
            ->join('salud.estado_cita as ec', 'ec.estadoid', '=', 'c.estadoid')
            ->join('basic.personaid as p', 'p.personaid', '=', 'c.pacienteid')
            ->join('salud.consulta as co', 'co.citaid', '=', 'c.citaid')
            ->where('c.citaid', $citaid)
            ->first();

        return response()->json([
            "status" => true,
            "message" => "success",
            "data" => $results
        ]);
    }

    public function addCita(Request $request)
    {
        $validated = $request->validate([
            "pacienteid" => 'required|numeric',
            "tiposervicioid" => 'required|numeric',
            "medicoid" => 'required|numeric',
            "especialidadid" => 'required|numeric',
            "fecha" => 'required',
            "hora" => 'required',
            "costo" => 'required|numeric',
            "observacion" => 'nullable',
        ]);

        $jResponse = [];

        DB::beginTransaction();
        try {
            $jResponse = Cita::create([
                'pacienteid' => $validated['pacienteid'],
                'tiposervicioid' => $validated['tiposervicioid'],
                'medicoid' => $validated['medicoid'],
                'especialidadid' => $validated['especialidadid'],
                'fecha' => $validated['fecha'],
                'hora' => $validated['hora'],
                'costo' => $validated['costo'],
                'estadoid' => 1,
                'observacion' => $validated['observacion'],

                // defaults
                'registro' => Carbon::now(),
                'edificioid' => 1,
                'referencia' => ' ',
                'refrenciaid1' => 0,
                'refrenciaid2' => 0,
                'usuarioid' => 1,
                'ip' => 'Dsoft',
            ]);

            $citaid = $jResponse->citaid;
            $newConsultaid = DB::table('salud.consulta')->max('consultaid') + 1;

            DB::table('salud.consulta')->insert([
                'consultaid' => $newConsultaid,
                'registro' => Carbon::now(),
                'citaid' => $citaid,
                'anamnesis' => ' ',
                'usuarioid' => 1,
                'ip' => '127.0.0.1',
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
            "message" => "Appointment registered successfully",
            "data" => $jResponse
        ]);
    }

    public function updateCita(Request $request, $citaid)
    {
        $validated = $request->validate([
            "pacienteid" => 'required|numeric',
            "tiposervicioid" => 'required|numeric',
            "medicoid" => 'required|numeric',
            "especialidadid" => 'required|numeric',
            "fecha" => 'required',
            "hora" => 'required',
            "costo" => 'required|numeric',
            "observacion" => 'nullable',
        ]);

        $jResponse = [];

        DB::beginTransaction();
        try {
            Cita::where('citaid', $citaid)->update([
                'pacienteid' => $validated['pacienteid'],
                'tiposervicioid' => $validated['tiposervicioid'],
                'medicoid' => $validated['medicoid'],
                'especialidadid' => $validated['especialidadid'],
                'fecha' => $validated['fecha'],
                'hora' => $validated['hora'],
                'costo' => $validated['costo'],
                'estadoid' => 1,
                'observacion' => $validated['observacion'],

                // defaults
                'edificioid' => 1,
                'referencia' => ' ',
                'refrenciaid1' => 0,
                'refrenciaid2' => 0,
                'usuarioid' => 1,
                'ip' => 'Dsoft',
            ]);

            $jResponse = Cita::where('citaid', $citaid)->first();

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
            "message" => "Appointment updated successfully",
            "data" => $jResponse
        ]);
    }

    public function updateStatusCita(Request $request, $citaid)
    {
        $validated = $request->validate([
            "estadoid" => 'required|numeric',
        ]);

        $jResponse = [];

        DB::beginTransaction();
        try {
            Cita::where('citaid', $citaid)->update([
                'estadoid' => $validated['estadoid'],

                // defaults
                'edificioid' => 1,
                'referencia' => ' ',
                'refrenciaid1' => 0,
                'refrenciaid2' => 0,
                'usuarioid' => 1,
                'ip' => 'Dsoft',
            ]);

            $jResponse = Cita::where('citaid', $citaid)->first();

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
            "message" => "Appointment updated successfully",
            "data" => $jResponse
        ]);
    }
}
