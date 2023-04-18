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
                <th>COR</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $dat)
                <tr>
                    <td>{{ $dat['stn'] }}</td>
                    <td>{{ $dat['date'] }}</td>
                    <td>{{ $dat['time'] }}</td>
                    <td>{{ $dat['temp'] }}</td>
                    <td>{{ $dat['dewp'] }}</td>
                    <td>{{ $dat['stp'] }}</td>
                    <td>{{ $dat['slp'] }}</td>
                    <td>{{ $dat['visib'] }}</td>
                    <td>{{ $dat['wdsp'] }}</td>
                    <td>{{ $dat['prcp'] }}</td>
                    <td>{{ $dat['sndp'] }}</td>
                    <td>{{ $dat['frshtt'] }}</td>
                    <td>{{ $dat['cldc'] }}</td>
                    <td>{{ $dat['wnddir'] }}</td>

                    @if(is_null($dat['cor']))
                        <td><img src={{ asset('img/GreenCheck.png') }} height="50px" alt={{ $dat['cor'] }}></td>
                    @elseif($dat['cor'])
                        <td><img src={{ asset('img/OrangeCheck.png') }} height="50px" alt={{ $dat['cor'] }}></td>
                    @else
                        <td><img src={{ asset('img/RedCross.png') }} height="50px" alt={{ $dat['cor'] }}></td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
    </section>

@endsection
