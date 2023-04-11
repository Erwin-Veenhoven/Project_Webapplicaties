@extends('layout.layout')

@section('content')

    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="{{ asset('contract.css') }}">

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
