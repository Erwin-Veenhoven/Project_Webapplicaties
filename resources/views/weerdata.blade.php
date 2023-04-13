@extends('layout.layout')

@section('content')


    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="{{ asset('monitor.css') }}">

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
