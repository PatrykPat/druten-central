<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <H1>maak account met role</H1>
    <?php
    ?>
    
    <form method="POST" action="{{ route('AddUser') }}">
    @csrf

    <label for="name">Naam:</label><br>
    <input placeholder="gebruiker" type="text" id="name" name="name" value="{{ old('name') }}"><br>

    <label for="password">Wachtwoord:</label><br>
    <input placeholder="wachtwoord" type="password" id="password" name="password" value="{{ old('password') }}"><br>

    <label for="email">E-mail:</label><br>
    <input placeholder="wachtwoord" type="email" id="email" name="email" value="{{ old('email') }}"><br>

    <label for="role">Rol:</label><br>
    <select id="role" name="role">
        <option value="1">Klant</option>
        <option value="2">Bedrijf</option>
        <option value="3">Admin</option>
    </select><br>
    

    <button type="submit">Gebruiker Toevoegen</button>
</form>

<h2>Existing Users</h2>

    
</body>
</html>