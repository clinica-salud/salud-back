<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Odontograma</title>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
    }

    /* HEADER */
    .header {
        overflow: hidden;
        margin-bottom: 20px;
        padding: 10px;
    }

    .logo {
        float: left;
        width: 250px;
    }

    .info {
        overflow: hidden;
        margin-left: 220px;
        line-height: 1.5;
    }

    .info h4,
    .info h5 {
        margin: 0;
        color: #566781;
    }

    .header:before,
    .header:after {
        content: " ";
        display: table;
    }

    .header:after {
        clear: both;
    }

    /* ODONTOGRAM */
    .image-section {
        text-align: center;
        margin-bottom: 30px;
    }

    .image-section img {
        max-width: 90%;
        display: inline-block;
    }

    .image-section h2 {
        background-color: #6083c7;
        color: #fff;
        margin-top: 10px;
        margin-bottom: 20px;
        padding: 10px;
        font-size: 1.2em;
    }

    /* PACIENT */
    .pacient {
        border: 1px solid #ccc;
        padding: 10px;
        margin-bottom: 10px;
    }

    .pacient h2 {
        margin-top: 0;
        margin-bottom: 0;
        font-size: 1.1em;
    }

    .pacient p {
        margin: 5px 0;
        font-size: 0.8em;
    }

    /* TABLE */
    .odontogram-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    .odontogram-table th,
    .odontogram-table td {
        border: 1px solid #ccc;
        padding: 4px;
        text-align: center;
        font-size: 0.8em;
    }

    .odontogram-table th {
        background-color: #f0f0f0;
        font-weight: bold;
        font-size: 0.9em;
    }

    .odontogram-table tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    /* ODONTOGRAM TABLE */
    .table-odontograma {
        border-collapse: collapse;
        width: 100%;
    }

    .table-odontograma td,
    .table-odontograma th {
        border-top: 1px solid #dee2e6;
        border-bottom: 1px solid #dee2e6;
        padding: 0.5rem;
        border-left: none;
        border-right: none;
    }

    .table-odontograma td {
        text-align: center;
        padding: 0;
        font-size: 0.8em;
    }
</style>

<body>
    <header class="header">
        <div class="logo">
            <img src="{{ public_path('images/logo_name.png') }}" width="250" alt="Logo">
        </div>
        <div class="info">
            <h4>HISTORIA CLÍNICA N° {{ $consulta->consultaid }}</h4>
            <h5>FECHA: {{ $consulta->fecha }}</h5>
        </div>
    </header>
    <section class="pacient">
        <h2>DATOS DEL PACIENTE</h2>
        <p>Nombre y Apellido: <b>{{ $consulta->paciente_nombre }} {{ $consulta->paciente_ape_pat }}
                {{ $consulta->paciente_ape_mat }}</b> </p>
        <p>Fecha de Nacimiento: <b>{{ $consulta->nacimiento }}</b> </p>
        <p>DNI: <b>{{ $consulta->dni }}</b></p>
        <p>Sexo: <b>{{ $consulta->sexo }}</b> </p>
    </section>
    <section class="pacient">
        <h2>ANAMNESIS</h2>
        <p>Motivo de Consulta: <b>{{ $consulta->anamnesis }}</b></p>
    </section>
    <section class="image-section">
        <h2>ODONTOGRAMA - PREVIO / DIAGNÓSTICO</h2>
        @php
            $highlightedPiezas = $treatments->pluck('pieza')->toArray();
        @endphp
        <table class="table-odontograma">
            <tbody>
                <tr>
                    @foreach (['18C', '17C', '16C', '15C', '14C', '13C', '12C', '11C', '21C', '22C', '23C', '24C', '25C', '26C', '27C', '28C'] as $pieza)
                        @php
                            $highlight = in_array($pieza, $highlightedPiezas) ? 'background-color: #bbdabb;' : '';
                        @endphp
                        <td style="{{ $highlight }}">
                            <img src="{{ public_path("images/adult/{$pieza}.png") }}" id="{{ $pieza }}"
                                alt="odontograma">
                        </td>
                    @endforeach
                </tr>
                <tr>
                    @foreach (['18B', '17B', '16B', '15B', '14B'] as $pieza)
                        @php
                            $highlight = in_array($pieza, $highlightedPiezas) ? 'background-color: #bbdabb;' : '';
                        @endphp
                        <td style="{{ $highlight }}">
                            <img src="{{ public_path("images/adult/{$pieza}.png") }}" id="{{ $pieza }}"
                                alt="odontograma">
                        </td>
                    @endforeach

                    @for ($i = 0; $i < 6; $i++)
                        <td></td>
                    @endfor

                    @foreach (['24B', '25B', '26B', '27B', '28B'] as $pieza)
                        @php
                            $highlight = in_array($pieza, $highlightedPiezas) ? 'background-color: #bbdabb;' : '';
                        @endphp
                        <td style="{{ $highlight }}">
                            <img src="{{ public_path("images/adult/{$pieza}.png") }}" id="{{ $pieza }}"
                                alt="odontograma">
                        </td>
                    @endforeach
                </tr>
                <tr>
                    @foreach (['18A', '17A', '16A', '15A', '14A', '13A', '12A', '11A', '21A', '22A', '23A', '24A', '25A', '26A', '27A', '28A'] as $pieza)
                        @php
                            $highlight = in_array($pieza, $highlightedPiezas) ? 'background-color: #bbdabb;' : '';
                        @endphp
                        <td style="{{ $highlight }}">
                            <img src="{{ public_path("images/adult/{$pieza}.png") }}" id="{{ $pieza }}"
                                alt="odontograma">
                        </td>
                    @endforeach
                </tr>
                <tr>
                    @foreach (['18', '17', '16', '15', '14', '13', '12', '11', '21', '22', '23', '24', '25', '26', '27', '28'] as $pieza)
                        <td>
                            {{ $pieza }}
                        </td>
                    @endforeach
                </tr>
                <tr>
                    @foreach (['48', '47', '46', '45', '44', '43', '42', '41', '31', '32', '33', '34', '35', '36', '37', '38'] as $pieza)
                        <td>
                            {{ $pieza }}
                        </td>
                    @endforeach
                </tr>
                <tr>
                    @foreach (['48A', '47A', '46A', '45A', '44A', '43A', '42A', '41A', '31A', '32A', '33A', '34A', '35A', '36A', '37A', '38A'] as $pieza)
                        @php
                            $highlight = in_array($pieza, $highlightedPiezas) ? 'background-color: #bbdabb;' : '';
                        @endphp
                        <td style="{{ $highlight }}">
                            <img src="{{ public_path("images/adult/{$pieza}.png") }}" id="{{ $pieza }}"
                                alt="odontograma">
                        </td>
                    @endforeach
                </tr>
                <tr>
                    @foreach (['48B', '47B', '46B', '45B', '44B'] as $pieza)
                        @php
                            $highlight = in_array($pieza, $highlightedPiezas) ? 'background-color: #bbdabb;' : '';
                        @endphp
                        <td style="{{ $highlight }}">
                            <img src="{{ public_path("images/adult/{$pieza}.png") }}" id="{{ $pieza }}"
                                alt="odontograma">
                        </td>
                    @endforeach

                    @for ($i = 0; $i < 6; $i++)
                        <td> </td>
                    @endfor

                    @foreach (['34B', '35B', '36B', '37B', '38B'] as $pieza)
                        @php
                            $highlight = in_array($pieza, $highlightedPiezas) ? 'background-color: #bbdabb;' : '';
                        @endphp
                        <td style="{{ $highlight }}">
                            <img src="{{ public_path("images/adult/{$pieza}.png") }}" id="{{ $pieza }}"
                                alt="odontograma">
                        </td>
                    @endforeach
                </tr>
                <tr>
                    @foreach (['48C', '47C', '46C', '45C', '44C', '43C', '42C', '41C', '31C', '32C', '33C', '34C', '35C', '36C', '37C', '38C'] as $pieza)
                        @php
                            $highlight = in_array($pieza, $highlightedPiezas) ? 'background-color: #bbdabb;' : '';
                        @endphp
                        <td style="{{ $highlight }}">
                            <img src="{{ public_path("images/adult/{$pieza}.png") }}" id="{{ $pieza }}"
                                alt="odontograma">
                        </td>
                    @endforeach
                </tr>
            </tbody>
        </table>
    </section>
    <section class="image-section" style="page-break-inside: avoid;">
        <h2>ODONTOGRAMA - REALIZADO</h2>
        @php
            $highlightedPiezas = $treatments->where('faseodontogramaid', 2)->pluck('pieza')->toArray();
        @endphp
        <table class="table-odontograma">
            <tbody>
                <tr>
                    @foreach (['18C', '17C', '16C', '15C', '14C', '13C', '12C', '11C', '21C', '22C', '23C', '24C', '25C', '26C', '27C', '28C'] as $pieza)
                        @php
                            $highlight = in_array($pieza, $highlightedPiezas) ? 'background-color: #aac9e8;' : '';
                        @endphp
                        <td style="{{ $highlight }}">
                            <img src="{{ public_path("images/adult/{$pieza}.png") }}" id="{{ $pieza }}"
                                alt="odontograma">
                        </td>
                    @endforeach
                </tr>
                <tr>
                    @foreach (['18B', '17B', '16B', '15B', '14B'] as $pieza)
                        @php
                            $highlight = in_array($pieza, $highlightedPiezas) ? 'background-color: #aac9e8;' : '';
                        @endphp
                        <td style="{{ $highlight }}">
                            <img src="{{ public_path("images/adult/{$pieza}.png") }}" id="{{ $pieza }}"
                                alt="odontograma">
                        </td>
                    @endforeach

                    @for ($i = 0; $i < 6; $i++)
                        <td></td>
                    @endfor

                    @foreach (['24B', '25B', '26B', '27B', '28B'] as $pieza)
                        @php
                            $highlight = in_array($pieza, $highlightedPiezas) ? 'background-color: #aac9e8;' : '';
                        @endphp
                        <td style="{{ $highlight }}">
                            <img src="{{ public_path("images/adult/{$pieza}.png") }}" id="{{ $pieza }}"
                                alt="odontograma">
                        </td>
                    @endforeach
                </tr>
                <tr>
                    @foreach (['18A', '17A', '16A', '15A', '14A', '13A', '12A', '11A', '21A', '22A', '23A', '24A', '25A', '26A', '27A', '28A'] as $pieza)
                        @php
                            $highlight = in_array($pieza, $highlightedPiezas) ? 'background-color: #aac9e8;' : '';
                        @endphp
                        <td style="{{ $highlight }}">
                            <img src="{{ public_path("images/adult/{$pieza}.png") }}" id="{{ $pieza }}"
                                alt="odontograma">
                        </td>
                    @endforeach
                </tr>
                <tr>
                    @foreach (['18', '17', '16', '15', '14', '13', '12', '11', '21', '22', '23', '24', '25', '26', '27', '28'] as $pieza)
                        <td>
                            {{ $pieza }}
                        </td>
                    @endforeach
                </tr>
                <tr>
                    @foreach (['48', '47', '46', '45', '44', '43', '42', '41', '31', '32', '33', '34', '35', '36', '37', '38'] as $pieza)
                        <td>
                            {{ $pieza }}
                        </td>
                    @endforeach
                </tr>
                <tr>
                    @foreach (['48A', '47A', '46A', '45A', '44A', '43A', '42A', '41A', '31A', '32A', '33A', '34A', '35A', '36A', '37A', '38A'] as $pieza)
                        @php
                            $highlight = in_array($pieza, $highlightedPiezas) ? 'background-color: #aac9e8;' : '';
                        @endphp
                        <td style="{{ $highlight }}">
                            <img src="{{ public_path("images/adult/{$pieza}.png") }}" id="{{ $pieza }}"
                                alt="odontograma">
                        </td>
                    @endforeach
                </tr>
                <tr>
                    @foreach (['48B', '47B', '46B', '45B', '44B'] as $pieza)
                        @php
                            $highlight = in_array($pieza, $highlightedPiezas) ? 'background-color: #aac9e8;' : '';
                        @endphp
                        <td style="{{ $highlight }}">
                            <img src="{{ public_path("images/adult/{$pieza}.png") }}" id="{{ $pieza }}"
                                alt="odontograma">
                        </td>
                    @endforeach

                    @for ($i = 0; $i < 6; $i++)
                        <td> </td>
                    @endfor

                    @foreach (['34B', '35B', '36B', '37B', '38B'] as $pieza)
                        @php
                            $highlight = in_array($pieza, $highlightedPiezas) ? 'background-color: #aac9e8;' : '';
                        @endphp
                        <td style="{{ $highlight }}">
                            <img src="{{ public_path("images/adult/{$pieza}.png") }}" id="{{ $pieza }}"
                                alt="odontograma">
                        </td>
                    @endforeach
                </tr>
                <tr>
                    @foreach (['48C', '47C', '46C', '45C', '44C', '43C', '42C', '41C', '31C', '32C', '33C', '34C', '35C', '36C', '37C', '38C'] as $pieza)
                        @php
                            $highlight = in_array($pieza, $highlightedPiezas) ? 'background-color: #aac9e8;' : '';
                        @endphp
                        <td style="{{ $highlight }}">
                            <img src="{{ public_path("images/adult/{$pieza}.png") }}" id="{{ $pieza }}"
                                alt="odontograma">
                        </td>
                    @endforeach
                </tr>
            </tbody>
        </table>
    </section>
    <section class="pacient">
        <h2>OBSERVACIONES</h2>
        <p>{{ $consulta->observacion }}</p>
    </section>
    <section class="image-section">
        <h2>TRATAMIENTO</h2>
        <table class="odontogram-table">
            <thead>
                <tr>
                    <th>Diagnóstico</th>
                    <th>Práctica</th>
                    <th>Pieza Dental</th>
                    <th>Cara</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($treatments as $item)
                    @php
                        $highlight =
                            $item->faseodontogramaid == 2 ? 'background-color: #aac9e8;' : 'background-color: #bbdabb;';
                    @endphp
                    <tr>
                        <td>{{ $item->observacion }}</td>
                        <td>{{ $item->tipo_tratamiento }}</td>
                        <td>{{ $item->pieza_numero }}{{ $item->pieza_fila }}</td>
                        <td>{{ $item->tipo_cara }}</td>
                        <td style="{{ $highlight }}">{{ $item->fase_odontograma }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
    <section class="image-section" style="page-break-inside: avoid;">
        <h2>RECETA</h2>
        <table class="odontogram-table">
            <thead>
                <tr>
                    <th>Medicamento</th>
                    <th>Indicaciones</th>
                    <th>Via de administración</th>
                    <th>Dosis</th>
                    <th>Frecuencia</th>
                    <th>Tiempo</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($recipes as $item)
                    <tr>
                        <td>{{ $item->medicamento }}</td>
                        <td>{{ $item->indicaciones }}</td>
                        <td>{{ $item->via_administracion }}</td>
                        <td>{{ $item->dosis }}</td>
                        <td>{{ $item->frecuencia }}</td>
                        <td>{{ $item->tiempo }}</td>
                        <td>{{ $item->cantidad }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
    <section class="image-section" style="page-break-inside: avoid;">
        <h2>DIAGNÓSTICO</h2>
        <table class="odontogram-table">
            <thead>
                <tr>
                    <th>Diagnóstico</th>
                    <th>Práctica</th>
                    <th>Pieza Dental</th>
                    <th>Cara</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($diagnosis as $item)
                    <tr>
                        <td>{{ $item->observacion }}</td>
                        <td>{{ $item->tipo_tratamiento }}</td>
                        <td>{{ $item->pieza_numero }}{{ $item->pieza_fila }}</td>
                        <td>{{ $item->tipo_cara }}</td>
                    </tr>
                @endforeach>
            </tbody>
        </table>
    </section>
</body>

</html>
