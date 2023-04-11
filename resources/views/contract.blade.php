@extends('layout.layout')

@section('content')

    <style>
        /* CSS voor de pagina */
        div {
            text-align: center;
            margin: 0 auto;
        }

        h2 {
            font-size: 1.5em;
            font-weight: bold;
            color: #333;
        }

        p {
            font-size: 1.2em;
            color: #666;
            margin: 0.5em 0;
        }

        a {
            color: #333;
            text-decoration: none;
            display: inline-block;
        }

        a:hover {
            color: #555;
            border-bottom-color: #555;
        }

        </style>

    <link rel="stylesheet" href="{{ asset('style.css') }}">

    <section>
        <div>
            <h1>Huidig Contract</h1>
            <h2>Contract Gegevens:</h2>
            <p>Abonnement Type: [    Data    ]</p>
            <p>Datum van akkoord: [    Data    ]</p>
            <p>Datum van verlenging: [    Data    ]</p>
            <a href="#">Aanpassen</a>
        </div>
    </section>

@endsection
