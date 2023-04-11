@extends('layout.layout')

@section('content')

    <style>
        /* CSS voor de pagina */
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            border-radius: 10px;
            margin: 0 auto;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        thead {
            background-color: #333;
            color: white;
        }

        th, td {
            padding: 1em;
            text-align: center;
            border: 1px solid #ddd;
        }

        th:first-child, td:first-child {
            text-align: left;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

    </style>

    <link rel="stylesheet" href="{{ asset('style.css') }}">

    <section>
        <h1>Weather Station Data</h1>
        <table style="padding: 10px; max-width: 1000px; border-radius: 10px">
            <thead>
            <tr>
                <th>STN</th>
                <th>DATE</th>
                <th>TIME</th>
                <th>TEMP</th>
                <th>DEWP</th>
                <th>STP</th>
                <th>SLP</th>
                <th>VISIB</th>
                <th>WDSP</th>
                <th>PRCP</th>
                <th>SNDP</th>
                <th>FRSHTT</th>
                <th>CLDC</th>
                <th>WNDDIR</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>DATA</td>
                <td>DATA</td>
                <td>DATA</td>
                <td>DATA</td>
                <td>DATA</td>
                <td>DATA</td>
                <td>DATA</td>
                <td>DATA</td>
                <td>DATA</td>
                <td>DATA</td>
                <td>DATA</td>
                <td>DATA</td>
                <td>DATA</td>
                <td>DATA</td>
            </tr>
            </tbody>
        </table>
    </section>

@endsection
