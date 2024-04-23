<a href="/contests">Versenyek</a>
<a href="/users">Felhasználók</a>
<a href="/welcome">Come back</a>
<a href="/bye">Go away</a>
@auth
    <span>Üdv, {{ auth()->user()->surname }} {{ auth()->user()->givenname }}!</span>
    <a href="/login">Kijelentkezés</a>
@else
    <a href="/signup">Regisztráció</a>
    <a href="/login">Bejelentkezés</a>
@endauth
