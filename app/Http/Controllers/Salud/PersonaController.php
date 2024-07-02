<?php

namespace App\Http\Controllers\Salud;

use App\Http\Controllers\Controller;
use App\Models\Basic\Persona;
use App\Models\Basic\PersonaNatural;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PersonaController extends Controller
{
    public static function searchPersona($dni)
    {
        $apiUrl = "https://api.apis.net.pe/v1/dni?numero=$dni";

        $response = Http::withOptions(['verify' => false])->get($apiUrl);

        if ($response->successful()) {
            return $response->json();
        } else {
            return [
                'error' => 'Unable to retrieve data from the API.',
                'status' => $response->status(),
                'body' => $response->body(),
            ];
        }
    }

    public function getPersonaDNI(Request $request)
    {
        $dni = $request->dni;

        DB::beginTransaction();
        try {
            $exists = DB::table('basic.personaid as p')
                ->select('p.personaid')
                ->where('p.tipoid', 1)
                ->where('p.numero', $dni)
                ->exists();

            if (!$exists) {
                $apiResponse = self::searchPersona($dni);

                if (isset($apiResponse['error'])) {
                    return response()->json([
                        "status" => false,
                        "message" => $apiResponse['error'],
                        "data" => []
                    ]);
                }

                $dni = $apiResponse['numeroDocumento'] ?? null;
                $nombre = $apiResponse['nombres'] ?? null;
                $ape_pat = $apiResponse['apellidoPaterno'] ?? null;
                $ape_mat = $apiResponse['apellidoMaterno'] ?? null;

                // Insert into `persona`
                $persona = Persona::create([
                    'registro' => Carbon::now(),
                    'tipo' => '',
                    'direccion' => '',
                    'distritoid' => 1249,
                    'foto' => '',
                    'telefono' => '',
                    'email' => '',
                    'rol' => '',
                    'usuarioid' => 0,
                    'ip' => $request->ip(),
                    'estado' => true,
                    'paisid' => 1
                ]);
                $personaid = $persona->personaid;

                PersonaNatural::create([
                    'personaid' => $personaid,
                    'titulo' => '',
                    'ape_pat' => $ape_pat,
                    'ape_mat' => $ape_mat,
                    'nombre' => $nombre,
                    'sexo' => '',
                    'est_civil' => '',
                    'nacimiento' => '1980-05-15',
                ]);

                DB::table('basic.personaid')->insert([
                    'tipoid' => 1,
                    'numero' => $dni,
                    'personaid' => $personaid,
                    'main' => false
                ]);

                $results = DB::table('basic.personaid as p')
                    ->select(
                        'p.personaid',
                        'p.numero as dni',
                        'pn.ape_pat',
                        'pn.ape_mat',
                        'pn.nombre'
                    )
                    ->join('basic.persona_natural as pn', 'pn.personaid', '=', 'p.personaid')
                    ->where('p.personaid', $personaid)
                    ->first();
            } else {
                $results = DB::table('basic.personaid as p')
                    ->select(
                        'p.personaid',
                        'p.numero as dni',
                        'pn.ape_pat',
                        'pn.ape_mat',
                        'pn.nombre'
                    )
                    ->join('basic.persona_natural as pn', 'pn.personaid', '=', 'p.personaid')
                    ->where('p.numero', $dni)
                    ->first();
            }

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
            "message" => "success",
            "data" => $results
        ]);
    }
}
