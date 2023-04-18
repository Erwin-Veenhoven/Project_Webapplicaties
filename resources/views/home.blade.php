@extends('layout.layout')

@section('content')


    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="{{ asset('home.css') }}">

    <section>
        <h1>Homepagina</h1>
        <div class="container">
            <div class="box">
                <h2>Weerdata</h2>
                <form action="/monitor" method="post">
                    @csrf
                    <input type="text" placeholder="sleutel" name="sleutel">
                    <input type="submit" value="Zoek">
                </form>
                <p> Hier kunt u een sleutel invoeren om de bijbehorende weerdata op te vragen. </p>

            </div>
            <div class="box">
                <h2>Producten</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
            <div class="box">
                <h2>Contact</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
        </div>

    </section>

@endsection
