@extends('layout.layout')

@section('content')

    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="{{ asset('about.css') }}">

    <section>
        <h1>About Page</h1>

        <div>
            <img src="LogoIWA.jpg" alt="Bedrijfslogo" style="width: 300px;">
            <p> Welkom bij het Internationale Weer Agentschap (IWA)! Wij zijn een organisatie die
                zich ten doel heeft gesteld om gegevens over de wereldwijde toestand van het weer
                te verzamelen, op te slaan en beschikbaar te stellen aan belangstellenden. Ons
                hoofdkantoor is gevestigd in Groningen, waar we profiteren van een uitstekende
                Internet-infrastructuur en goede lobbyresultaten van de Nederlandse regering.
                Als partner van de VN hebben we de steun van alle VN-leden gekregen om hun lokale
                weerstations te verbinden met ons agentschap en hun weerdiensten te voorzien van
                informatie. Het eigendom en beheer van de lokale weerstations blijft in handen van
                de verschillende weerdiensten.
                Het IWA heeft een overzichtelijke organisatie, met een managementteam bestaande uit
                de algemeen directeur en vier afdelingshoofden. Onze afdelingen zijn Data Acquisition,
                ICT Services, Application Development & Maintanance en Service Management. Elke afdeling
                heeft een specifieke verantwoordelijkheid in het verzamelen, opslaan en beschikbaar stellen
                van weergegevens aan onze klanten.
            </p>
        </div>
    </section>

@endsection
