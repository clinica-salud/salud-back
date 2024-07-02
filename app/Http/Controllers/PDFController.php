<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PDFController extends Controller
{
    public function generatePDF($consultaid)
    {
        $consulta = DB::table('salud.consulta as c')
            ->select(
                'c.consultaid',
                'c.anamnesis',
                'ci.citaid',
                'ci.pacienteid',
                'ci.fecha',
                'ci.observacion',
                'pn.ape_pat as paciente_ape_pat',
                'pn.ape_mat as paciente_ape_mat',
                'pn.nombre as paciente_nombre',
                'pn.sexo',
                'pn.nacimiento',
                'p.numero as dni'
            )
            ->join('salud.cita as ci', 'ci.citaid', '=', 'c.citaid')
            ->join('basic.persona_natural as pn', 'pn.personaid', '=', 'ci.pacienteid')
            ->join('basic.personaid as p', 'p.personaid', '=', 'pn.personaid')
            ->where('c.consultaid', '=', $consultaid)
            ->first();

        $diagnosis = DB::table('salud.consulta_odontograma as co')
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

        $treatments = DB::table('salud.consulta_odontograma as co')
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
            ->where('co.es_tratamiento', true)
            ->get();

        $recipes = DB::table('salud.receta as r')
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
            )
            ->where('r.citaid', '=', $consulta->citaid)
            ->get();

        $pdf = Pdf::loadView('pdf', ['consulta' => $consulta, 'diagnosis' => $diagnosis, 'treatments' => $treatments, 'recipes' => $recipes]);
        return $pdf->download('odontograma.pdf');

        // $pdf = Pdf::loadView('pdf');
        // return $pdf->stream('odontograma.pdf');
    }
}
