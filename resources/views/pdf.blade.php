<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
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
        <p>Nombre y Apellido: <b>{{ $consulta->paciente_nombre }} {{ $consulta->paciente_ape_pat }} {{ $consulta->paciente_ape_mat }}</b> </p>
        <p>Fecha de Nacimiento: <b>{{ $consulta->nacimiento }}</b> </p>
        <p>DNI: <b>{{ $consulta->dni }}</b></p>
        <p>Sexo: <b>{{ $consulta->sexo }}</b> </p>
    </section>
    <section class="pacient">
        <h2>ANAMNESIS</h2>
        <p>Motivo de Consulta: <b>{{ $consulta->anamnesis }}</b></p>
    </section>
    <section class="image-section">
        <h2>ODONTOGRAMA</h2>
        <img src="{{ public_path('images/odontograma.png') }}" width="90%" alt="Odontograma">
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
                </tr>
            </thead>
            <tbody>
                @foreach ($treatments as $item)
                <tr>
                    <td>{{ $item->observacion }}</td>
                    <td>{{ $item->tipo_tratamiento }}</td>
                    <td>{{ $item->pieza_numero }}{{ $item->pieza_fila }}</td>
                    <td>{{ $item->tipo_cara }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>
    <section class="image-section">
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
    <section class="image-section">
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
