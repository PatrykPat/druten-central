<!-- <x-slot name="header" class="bg-transparent">
        <h2 class="font-semibold bg-transparent text-center text-4xl text-white leading-tight">
            {{ __('Gebruiker maken') }}
        </h2>
    </x-slot>
<body>
    <h1>Maak account met rol</h1>
    
    <form method="POST" action="{{ route('AddUser') }}">
        @csrf

        <label for="name">Naam:</label><br>
        <input placeholder="gebruiker" type="text" id="name" name="name" value="{{ old('name') }}"><br>

        <label for="password">Wachtwoord:</label><br>
        <input placeholder="wachtwoord" type="password" id="password" name="password" value="{{ old('password') }}"><br>

        <label for="email">E-mail:</label><br>
        <input placeholder="email" type="email" id="email" name="email" value="{{ old('email') }}"><br>

        <label for="role">Rol:</label><br>
        <select id="role" name="role">
            <option value="1">Klant</option>
            <option value="2">Bedrijf</option>
            <option value="3">Admin</option>
        </select><br>
        
        <button type="submit">Gebruiker Toevoegen</button>
    </form>

    <h2>Bestaande gebruikers</h2>
</body>
</html> -->
