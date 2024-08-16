<?php

namespace App\Http\Controllers\Salud;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReporteController extends Controller
{
    public function getReporte(Request $request)
    {
        $year = $request->year;
        $month = $request->month;

        // $citas = DB::table('salud.cita as c')
        //     ->select(DB::raw('COUNT(c.citaid) as total_citas'))
        //     ->whereYear('c.fecha', $year)
        //     ->whereMonth('c.fecha', $month)
        //     ->get();

        $currentMonthCita = DB::table('salud.cita as c')
            ->select(DB::raw('COUNT(c.citaid) as total_citas'))
            ->whereYear('c.fecha', $year)
            ->whereMonth('c.fecha', $month)
            ->get();

        $previousMonthCita = DB::table('salud.cita as c')
            ->select(DB::raw('COUNT(c.citaid) as total_citas'))
            ->whereYear('c.fecha', $year)
            ->whereMonth('c.fecha', $month - 1)
            ->get();

        $citas = [
            'current' => $currentMonthCita->first()->total_citas,
            'previous' => $previousMonthCita->first()->total_citas,
            'diffPercent' => $previousMonthCita->first()->total_citas != 0
                ? (($currentMonthCita->first()->total_citas - $previousMonthCita->first()->total_citas) / $previousMonthCita->first()->total_citas) * 100
                : 0,
            'status' => ($currentMonthCita->first()->total_citas > $previousMonthCita->first()->total_citas) ? 'up' : 'down'
        ];

        // $medicos = DB::table('salud.medico as m')
        //     ->select(DB::raw('COUNT(m.medicoid) as total_medicos'))
        //     ->whereYear('m.registro', $year)
        //     ->whereMonth('m.registro', $month)
        //     ->get();

        $currentMonthMedicos = DB::table('salud.medico as m')
            ->select(DB::raw('COUNT(m.medicoid) as total_medicos'))
            ->whereYear('m.registro', $year)
            ->whereMonth('m.registro', $month)
            ->get();

        $previousMonthMedicos = DB::table('salud.medico as m')
            ->select(DB::raw('COUNT(m.medicoid) as total_medicos'))
            ->whereYear('m.registro', $year)
            ->whereMonth('m.registro', $month - 1)
            ->get();

        $medicos = [
            'current' => $currentMonthMedicos->first()->total_medicos,
            'previous' => $previousMonthMedicos->first()->total_medicos,
            'diffPercent' => $previousMonthMedicos->first()->total_medicos != 0
                ? (($currentMonthMedicos->first()->total_medicos - $previousMonthMedicos->first()->total_medicos) / $previousMonthMedicos->first()->total_medicos) * 100
                : 0,
            'status' => ($currentMonthMedicos->first()->total_medicos > $previousMonthMedicos->first()->total_medicos) ? 'up' : 'down'
        ];

        // $tratamientos = DB::table('salud.consulta_odontograma as o')
        //     ->select(DB::raw('COUNT(o.tipotratamientoid) as total_tratamientos'))
        //     ->join('salud.consulta as c', 'c.consultaid', '=', 'o.consultaid')
        //     ->whereYear('c.registro', $year)
        //     ->whereMonth('c.registro', $month)
        //     ->where('o.es_tratamiento', true)
        //     ->get();

        $currentMonthTratamientos = DB::table('salud.consulta_odontograma as o')
            ->select(DB::raw('COUNT(o.tipotratamientoid) as total_tratamientos'))
            ->join('salud.consulta as c', 'c.consultaid', '=', 'o.consultaid')
            ->whereYear('c.registro', $year)
            ->whereMonth('c.registro', $month)
            ->where('o.es_tratamiento', true)
            ->get();

        $previousMonthTratamientos = DB::table('salud.consulta_odontograma as o')
            ->select(DB::raw('COUNT(o.tipotratamientoid) as total_tratamientos'))
            ->join('salud.consulta as c', 'c.consultaid', '=', 'o.consultaid')
            ->whereYear('c.registro', $year)
            ->whereMonth('c.registro', $month - 1)
            ->where('o.es_tratamiento', true)
            ->get();

        $tratamientos = [
            'current' => $currentMonthTratamientos->first()->total_tratamientos,
            'previous' => $previousMonthTratamientos->first()->total_tratamientos,
            'diffPercent' => $previousMonthTratamientos->first()->total_tratamientos != 0
                ? (($currentMonthTratamientos->first()->total_tratamientos - $previousMonthTratamientos->first()->total_tratamientos) / $previousMonthTratamientos->first()->total_tratamientos) * 100
                : 0,
            'status' => ($currentMonthTratamientos->first()->total_tratamientos > $previousMonthTratamientos->first()->total_tratamientos) ? 'up' : 'down'
        ];

        // $pagos = DB::table('salud.cita as c')
        //     ->select(DB::raw('SUM(c.costo) as total_pagos'))
        //     ->whereYear('c.fecha', $year)
        //     ->whereMonth('c.fecha', $month)
        //     ->get();

        $currentMonthPagos = DB::table('salud.cita as c')
            ->select(DB::raw('SUM(c.costo) as total_pagos'))
            ->whereYear('c.fecha', $year)
            ->whereMonth('c.fecha', $month)
            ->get();

        $previousMonthPagos = DB::table('salud.cita as c')
            ->select(DB::raw('SUM(c.costo) as total_pagos'))
            ->whereYear('c.fecha', $year)
            ->whereMonth('c.fecha', $month - 1)
            ->get();

        $pagos = [
            'current' => $currentMonthPagos->first()->total_pagos,
            'previous' => $previousMonthPagos->first()->total_pagos,
            'diffPercent' => $previousMonthPagos->first()->total_pagos != 0
                ? (($currentMonthPagos->first()->total_pagos - $previousMonthPagos->first()->total_pagos) / $previousMonthPagos->first()->total_pagos) * 100
                : 0,
            'status' => ($currentMonthPagos->first()->total_pagos > $previousMonthPagos->first()->total_pagos) ? 'up' : 'down'
        ];

        $pacientesSexo = DB::table('salud.cita as c')
            ->select(
                DB::raw('p.sexo'),
            )
            ->join('basic.persona_natural as p', 'p.personaid', '=', 'c.pacienteid')
            ->whereYear('c.fecha', $year)
            ->whereMonth('c.fecha', $month)
            ->get();

        $tipoTratamientos = DB::table('salud.consulta_odontograma as o')
            ->select(
                'o.tipotratamientoid',
                't.nombre as tipo_tratamiento',
                DB::raw('COUNT(o.consultaid) as total_tratamientos')
            )
            ->join('salud.tipo_tratamiento as t', 'o.tipotratamientoid', '=', 't.tipotratamientoid')
            ->join('salud.consulta as c', 'o.consultaid', '=', 'c.consultaid')
            ->whereYear('c.registro', $year)
            ->whereMonth('c.registro', $month)
            ->where('o.es_tratamiento', true)
            ->groupBy('o.tipotratamientoid', 't.nombre')
            ->get();

        $results = [
            'citas' => $citas,
            'medicos' => $medicos,
            'tratamientos' => $tratamientos,
            'pagos' => $pagos,
            'pacientesSexo' => $pacientesSexo,
            // 'citasDiarias' => $dailyAppointments,
            'tipoTratamientos' => $tipoTratamientos
        ];

        return response()->json([
            "status" => true,
            "message" => "success",
            "data" =>  $results
        ]);
    }

    public function getTratamientosPorAnho(Request $request)
    {
        $anho = $request->anho;

        $subQuery = DB::table('salud.consulta_odontograma as o')
            ->select(
                DB::raw('EXTRACT(MONTH FROM c.registro) AS month'),
                'o.tipotratamientoid',
                't.nombre AS tipo_tratamiento',
                DB::raw('COUNT(o.tipotratamientoid) AS total_tratamientos')
            )
            ->join('salud.tipo_tratamiento as t', 'o.tipotratamientoid', '=', 't.tipotratamientoid')
            ->join('salud.consulta as c', 'o.consultaid', '=', 'c.consultaid')
            ->where('o.es_tratamiento', true)
            ->whereYear('c.registro', $anho)
            ->groupBy(
                DB::raw('EXTRACT(MONTH FROM c.registro)'),
                'o.tipotratamientoid',
                't.nombre'
            );

        $tratamientos = DB::table(DB::raw('(SELECT generate_series(1, 12) AS month) as m'))
            ->select(
                'm.month',
                DB::raw('COALESCE(sub.tipotratamientoid, 0) AS tipotratamientoid'),
                DB::raw('COALESCE(sub.tipo_tratamiento, \'-\') AS tipo_tratamiento'),
                DB::raw('COALESCE(sub.total_tratamientos, 0) AS total_tratamientos')
            )
            ->leftJoinSub($subQuery, 'sub', 'm.month', '=', 'sub.month')
            ->orderBy('m.month')
            ->get();

        return response()->json([
            "status" => true,
            "message" => "success",
            "data" =>  $tratamientos
        ]);
    }

    public function getActividadDiariaPorAnho(Request $request)
    {
        $date = $request->date;

        $dailyAppointments = DB::table('salud.cita as c')
            ->select(
                'c.citaid',
                'p.nombre as paciente_nombre',
                'p.ape_pat as paciente_ape_pat',
                'p.ape_mat as paciente_ape_mat',
                'p2.nombre as medico_nombre',
                'p2.ape_pat as medico_ape_pat',
                'p2.ape_mat as medico_ape_mat',
                'e.nombre as especialidad',
                'e2.nombre as edificio',
                'ec.nombre as estado',
                'c.fecha',
                'c.hora'
            )
            ->join('basic.persona_natural as p', 'p.personaid', '=', 'c.pacienteid')
            ->join('basic.persona_natural as p2', 'p2.personaid', '=', 'c.medicoid')
            ->join('salud.especialidad as e', 'e.especialidadid', '=', 'c.especialidadid')
            ->join('basic.edificio as e2', 'e2.edificioid', '=', 'c.edificioid')
            ->join('salud.estado_cita as ec', 'ec.estadoid', '=', 'c.estadoid')
            ->whereDate('c.fecha', $date)
            ->get();

        return response()->json([
            "status" => true,
            "message" => "success",
            "data" =>  $dailyAppointments
        ]);
    }
}
