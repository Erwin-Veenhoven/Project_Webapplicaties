@extends('layout.layout')

@section('content')

    <link rel="stylesheet" href="{{ asset('style.css') }}">

<section>
    <h1>Login</h1>
    <form method="POST" action="login.php" style="border: 2px solid black; padding: 50px; max-width: 300px; margin: 0 auto; border-radius: 10px">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" name="password" required><br><br>
        <input type="submit" name="login" value="Login">
    </form>

</section>

@endsection



